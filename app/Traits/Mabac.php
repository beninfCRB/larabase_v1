<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Mabac
{
    public function sample()
    {
        return DB::table('sample_data as a')
            ->leftJoin('mcriterias as b', function ($join) {
                $join->on('a.criteria_id', '=', 'b.id')->join('mtypes as d', 'b.type_id', '=', 'd.id');
            })
            ->join('malternatives as c', 'a.alternative_id', '=', 'c.id')
            ->orderBy('alternative_id', 'asc')
            ->select(
                '*',
                'b.code as kode_kriteria',
                'b.id as id_kriteria',
                'b.value as bobot',
                'b.name as nama_kriteria',
                'c.code as kode_alternatif',
                'c.id as id_alternatif',
                'c.name as nama_alternatif',
                'a.id as id_data',
                'a.value as nilai',
                'd.name as jenis'
            )
            ->get();
    }

    public function new_object()
    {
        $data = $this->sample();
        $sample = [];
        foreach ($data as $t) {
            if (empty($sample[$t->kode_alternatif])) {
                $sample[$t->kode_alternatif] = [];
            }
            if (empty($sample[$t->kode_alternatif][$t->kode_kriteria])) {
                $sample[$t->kode_alternatif][$t->kode_kriteria] = [];
                $sample[$t->kode_alternatif][$t->kode_kriteria]['id_data'] = $t->id_data;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['nilai'] = $t->nilai;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['id_kriteria'] = $t->id_kriteria;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['jenis'] = $t->jenis;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['kode_kriteria'] = $t->kode_kriteria;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['nama_alternatif'] = $t->nama_alternatif;
                $sample[$t->kode_alternatif][$t->kode_kriteria]['bobot'] = $t->bobot;
            }
            $nama_kriteria[] = $t->nama_kriteria;
            $kriterias[] = $t->kode_kriteria;
            $alternatifs[] = $t->nama_alternatif;
        }

        return [
            'nilai' => $sample,
            'alternatif' => array_unique($alternatifs),
            'n_kriteria' => array_unique($nama_kriteria),
            'kriteria' => array_unique($kriterias),
            'jml_krt' => count(array_unique($kriterias))
        ];
    }

    public function max($criteria_id)
    {
        $data = DB::table('sample_data')
            ->select(DB::raw('max(value) as max'))
            ->where('criteria_id', '=', $criteria_id)
            ->first();

        if ($data->max == 0) {
            return 0;
        } else {
            return $data->max;
        }
    }

    public function min($criteria_id)
    {
        $data = DB::table('sample_data')
            ->select(DB::raw('min(value) as min'))
            ->where('criteria_id', '=', $criteria_id)
            ->first();

        if ($data->min == 0) {
            return 0;
        } else {
            return $data->min;
        }
    }
}

class ConstantMabac
{
    use Mabac;

    public function number($data)
    {
        return str_replace('.', ',', number_format($data, 3));
    }
}
