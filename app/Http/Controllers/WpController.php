<?php

namespace App\Http\Controllers;

use App\Models\Malternative;
use App\Models\Mcriteria;
use App\Traits\Method;
use App\Traits\UseMessage;
use Illuminate\Http\Request;

class WpController extends Controller
{
    use Method;
    use UseMessage;
    protected $title = 'Perhitungan Weight Product';
    protected $route = 'wps';

    public function __construct()
    {
        $this->Alert();
    }

    public function index()
    {
        $title = $this->title;
        $method = 'Perhitungan Weight Product';
        $breadcumb = [$this->route, $method];
        $nilai = $this->new_object()['nilai'];
        $alternatif = $this->new_object()['alternatif'];
        $n_kriteria = $this->new_object()['n_kriteria'];
        $kriteria = $this->new_object()['kriteria'];
        $jml_krt = $this->new_object()['jml_krt'];
        $o_kriteria = Mcriteria::all();
        $o_alternatif = Malternative::all();

        // dd($o_kriteria);
        return view('modules.' . $this->route . '.index', compact('title', 'method', 'breadcumb', 'nilai', 'alternatif', 'n_kriteria', 'kriteria', 'jml_krt', 'o_kriteria', 'o_alternatif'));
    }
}
