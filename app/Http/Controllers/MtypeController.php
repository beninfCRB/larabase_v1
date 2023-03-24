<?php

namespace App\Http\Controllers;

use App\DataTables\MtypesDataTable;
use App\Models\Mtype;
use App\Traits\UseMessage;
use Illuminate\Http\Request;

class MtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    protected $title = 'Master Jenis';
    protected $route = 'types';

    public function __construct()
    {
        $this->Alert();
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'code' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255']
        ]);
    }


    public function index(MtypesDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Jenis';
        $breadcumb = ['types', $method];
        return $dataTable->render('modules.master.type.index', compact('title', 'method', 'breadcumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $method = 'Buat Jenis Baru';
        $breadcumb = ['types', $method];
        return View('modules.master.type.create', compact('title', 'method', 'breadcumb'));
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
            Mtype::create([
                'code' => $request->code,
                'name' => $request->name,
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
        $title = $this->title;
        $method = 'Ubah Jenis';
        $breadcumb = ['types', $method];
        $data = Mtype::find($id);
        return View('modules.master.type.update', compact('title', 'data', 'method', 'breadcumb'));
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
            $user = Mtype::find($id);
            $user->update([
                'code' => $request->code,
                'name' => $request->name
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
        $user = Mtype::find($id);
        $user->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }
}
