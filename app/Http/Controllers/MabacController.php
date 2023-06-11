<?php

namespace App\Http\Controllers;

use App\Traits\Method;
use App\Traits\UseMessage;
use Illuminate\Http\Request;

class MabacController extends Controller
{
    use Method;
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
}
