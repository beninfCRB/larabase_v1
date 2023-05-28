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
        $title = $this->title;
        $method = 'Data Semua Data Sample';
        $breadcumb = [$this->route, $method];
        $data = SampleData::all();
        $alternative = Malternative::all();
        $criteria = Mcriteria::all();
        return view('modules.master.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'data', 'alternative', 'criteria'));
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
        $this->validation($request);

        try {
            SampleData::create([
                'alternative_id' => $request->alternative_id,
                'criteria_id' => $request->criteria_id,
                'value' => $request->value,
            ]);

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
        $this->validation($request);

        try {
            $user = SampleData::find($id);
            $user->update([
                'alternative_id' => $request->alternative_id,
                'criteria_id' => $request->criteria_id,
                'value' => $request->value,
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
        $user = SampleData::find($id);
        $user->delete();

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
