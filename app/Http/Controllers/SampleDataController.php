<?php

namespace App\Http\Controllers;

use App\Imports\SampleDataImport;
use App\Models\Malternative;
use App\Models\Mcriteria;
use App\Models\SampleData;
use App\Traits\Mabac;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SampleDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Mabac;
    use UseMessage;
    protected $title = 'Master Data Sample';
    protected $route = 'samples';

    public function __construct()
    {
        $this->Alert();
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'alternative_id' => ['required', 'string', 'max:10'],
            'criteria_id' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string', 'max:255']
        ]);
    }


    public function index()
    {
        // dd($this->new_object());
        $title = $this->title;
        $method = 'Data Semua Sample';
        $breadcumb = [$this->route, $method];
        $data = SampleData::all();
        $malternative = Malternative::all();
        $mcriteria = Mcriteria::all();
        $nilai = $this->new_object()['nilai'];
        $alternatif = $this->new_object()['alternatif'];
        $n_kriteria = $this->new_object()['n_kriteria'];
        $kriteria = $this->new_object()['kriteria'];
        $jml_krt = $this->new_object()['jml_krt'];
        // dd($nilai, $n_kriteria, $jml_krt, $kriteria);
        return view('modules.master.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'nilai', 'alternatif', 'n_kriteria', 'kriteria', 'jml_krt', 'data', 'malternative', 'mcriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alternative_id' => ['required', 'string', 'max:10']
        ]);

        try {
            $new = $this->new_object();

            $check = SampleData::where('alternative_id', $request->alternative_id)->first();
            if (isset($check)) {
                return redirect()->route($this->route . '.index')->with('error', 'Data Sudah Ada');
            }

            for ($i = 1; $i <= $new['jml_krt']; $i++) {
                SampleData::create([
                    'alternative_id' => $request->alternative_id,
                    'criteria_id' => Mcriteria::where('code', 'C' . $i)->first()->id,
                    'value' => 0
                ]);
            }

            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => ['required', 'string', 'max:255']
        ]);

        try {
            $user = SampleData::find($id);
            $user->update([
                'value' => $request->value
            ]);
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Malternative::where('code', $id)->first();
        $user = SampleData::where('alternative_id', $alternatif->id)->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_import()
    {
        $title = $this->title;
        $method = 'Import Data Sample';
        $breadcumb = [$this->route, $method];
        return View('modules.master.' . $this->route . '.import', compact('title', 'method', 'breadcumb'));
    }

    public function import()
    {
        try {
            Excel::import(new SampleDataImport, request()->file('import'));
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diimport');
        }
    }
}
