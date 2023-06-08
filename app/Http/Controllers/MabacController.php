<?php

namespace App\Http\Controllers;

use App\Traits\Mabac;
use App\Traits\UseMessage;
use Illuminate\Http\Request;

class MabacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Mabac;
    use UseMessage;
    protected $title = 'Perhitungan Mabac';
    protected $route = 'mabacs';

    public function __construct()
    {
        $this->Alert();
    }

    public function index()
    {
        $title = $this->title;
        $method = 'Perhitungan Mabac';
        $breadcumb = [$this->route, $method];
        $nilai = $this->new_object()['nilai'];
        $alternatif = $this->new_object()['alternatif'];
        $n_kriteria = $this->new_object()['n_kriteria'];
        $kriteria = $this->new_object()['kriteria'];
        $jml_krt = $this->new_object()['jml_krt'];

        return view('modules.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'nilai', 'alternatif', 'n_kriteria', 'kriteria', 'jml_krt'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mabac  $mabac
     * @return \Illuminate\Http\Response
     */
    public function show(Mabac $mabac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mabac  $mabac
     * @return \Illuminate\Http\Response
     */
    public function edit(Mabac $mabac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mabac  $mabac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mabac $mabac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mabac  $mabac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mabac $mabac)
    {
        //
    }
}
