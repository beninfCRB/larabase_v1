<?php

namespace App\Http\Controllers;

use App\DataTables\McriteriaDataTable;
use App\Imports\McriteriaImport;
use App\Models\Mcriteria;
use App\Models\Mtype;
use App\Models\SampleData;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class McriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    protected $title = 'Halaman Kriteria';
    protected $route = 'criterias';

    public function __construct()
    {
        $this->Alert();
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'code' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:25'],
            'value' => ['required', 'string', 'max:10'],
            'type_id' => ['required', 'integer']
        ]);
    }

    public function index(McriteriaDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Kriteria';
        $breadcumb = [$this->route, $method];
        $data = Mcriteria::all();
        $type = Mtype::all();
        return $dataTable->render('modules.master.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'data', 'type'));
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
            $new = Mcriteria::create([
                'code_criteria' => strtoupper($request->code),
                'name_criteria' => $request->name,
                'value_criteria' => $request->value,
                'type_id' => $request->type_id
            ]);

            $check = SampleData::where('criteria_id', '=', $new->id)->first();
            $alternative = SampleData::select('*')->groupBy('alternative_id')->get();
            if (is_null($check)) {
                foreach ($alternative as $a) {
                    SampleData::create([
                        'alternative_id' => $a->alternative_id,
                        'criteria_id' => $new->id,
                        'value_sample_data' => 0
                    ]);
                }
            }

            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route($this->route . '.index')->with('error', $e->getMessage());
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
            $user = Mcriteria::find($id);

            $user->update([
                'code_criteria' => strtoupper($request->code),
                'name_criteria' => $request->name,
                'value_criteria' => $request->value,
                'type_id' => $request->type_id
            ]);
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal ditambahkan');
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
        SampleData::where('criteria_id', '=', $id)->delete();
        $user = Mcriteria::find($id);
        $user->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_import()
    {
        $title = $this->title;
        $method = 'Import Data Kriteria';
        $breadcumb = [$this->route, $method];
        return View('modules.master.' . $this->route . '.import', compact('title', 'method', 'breadcumb'));
    }

    public function import()
    {
        try {
            Excel::import(new McriteriaImport, request()->file('import'));
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diimport');
        }
    }
}
