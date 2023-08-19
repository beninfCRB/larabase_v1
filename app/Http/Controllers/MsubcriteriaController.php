<?php

namespace App\Http\Controllers;

use App\DataTables\MsubcriteriaDataTable;
use App\Imports\MsubcriteriaImport;
use App\Models\Mcriteria;
use App\Models\Msubcriteria;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MsubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    protected $title = 'Halaman Sub-Kriteria';
    protected $route = 'subcriterias';

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
            'criteria_id' => ['required', 'integer']
        ]);
    }

    public function index(MsubcriteriaDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Sub-Kriteria';
        $breadcumb = [$this->route, $method];
        $data = Msubcriteria::all();
        $criteria = Mcriteria::all();
        return $dataTable->render('modules.master.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'data', 'criteria'));
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
            Msubcriteria::create([
                'code_subcriteria' => strtoupper($request->code),
                'name_subcriteria' => $request->name,
                'value_subcriteria' => $request->value,
                'criteria_id' => $request->criteria_id
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
            $user = Msubcriteria::find($id);

            $user->update([
                'code_subriteria' => strtoupper($request->code),
                'name_subcriteria' => $request->name,
                'value_subcriteria' => $request->value,
                'criteria_id' => $request->criteria_id
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
        $user = Msubcriteria::find($id);
        $user->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_import()
    {
        $title = $this->title;
        $method = 'Import Data Sub-Kriteria';
        $breadcumb = [$this->route, $method];
        return View('modules.master.' . $this->route . '.import', compact('title', 'method', 'breadcumb'));
    }

    public function import()
    {
        try {
            Excel::import(new MsubcriteriaImport, request()->file('import'));
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diimport');
        }
    }

    public function get_sub_kriteria(Request $request)
    {
        $data = Msubcriteria::where('criteria_id', '=', $request->criteria_id)->get();
        return response()->json($data);
    }
}
