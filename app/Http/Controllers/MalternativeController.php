<?php

namespace App\Http\Controllers;

use App\DataTables\MalternativeDataTable;
use App\Imports\MalternativeImport;
use App\Models\Malternative;
use App\Traits\Mabac;
use App\Traits\UseMessage;
use App\Traits\Wp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MalternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    protected $title = 'Halaman Alternatif';
    protected $route = 'alternatives';

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


    public function index(MalternativeDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Alternatif';
        $breadcumb = [$this->route, $method];
        $data = Malternative::all();
        return $dataTable->render('modules.master.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'data'));
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
            Malternative::create([
                'code_alternative' => strtoupper($request->code),
                'name_alternative' => $request->name,
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
            $user = Malternative::find($id);
            $user->update([
                'code_alternative' => strtoupper($request->code),
                'name_alternative' => $request->name
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
        $user = Malternative::find($id);
        $user->delete();

        return redirect()->route($this->route . '.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function show_import()
    {
        $title = $this->title;
        $method = 'Import Data Jenis';
        $breadcumb = [$this->route, $method];
        return View('modules.master.' . $this->route . '.import', compact('title', 'method', 'breadcumb'));
    }

    public function import()
    {
        try {
            Excel::import(new MalternativeImport, request()->file('import'));
            return redirect()->route($this->route . '.index')->with('success', 'Data berhasil diimport');
        } catch (\Throwable $th) {
            return redirect()->route($this->route . '.index')->with('error', 'Data gagal diimport');
        }
    }
}
