<?php

namespace App\Http\Controllers;

use App\DataTables\MsampleDataTable;
use App\Imports\MsampleImport;
use App\Models\Msample;
use App\Models\Mtype;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MsampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    protected $title = 'Master Sample';
    protected $route = 'samples';

    public function __construct()
    {
        $this->Alert();
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'code' => ['required', 'string', 'max:10'],
            'value' => ['required', 'string', 'max:10'],
            'type_id' => ['required', 'integer']
        ]);
    }

    public function index(MsampleDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Sample';
        $breadcumb = ['samples', $method];
        $data = Msample::all();
        $type = Mtype::all();
        return $dataTable->render('modules.master.sample.index', compact('title', 'method', 'breadcumb', 'data', 'type'));
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
            Msample::create([
                'code' => $request->code,
                'value' => $request->value,
                'type_id' => $request->type_id
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
            $user = Msample::find($id);

            $user->update([
                'code' => $request->code,
                'value' => $request->value,
                'type_id' => $request->type_id
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
        $user = Msample::find($id);
        $user->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_import()
    {
        $title = $this->title;
        $method = 'Import Data Sample';
        $breadcumb = ['samples', $method];
        return View('modules.master.sample.import', compact('title', 'method', 'breadcumb'));
    }

    public function import()
    {
        try {
            Excel::import(new MsampleImport, request()->file('import'));
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diimport');
        }
    }
}
