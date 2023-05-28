<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Mabac
{
    public function sample()
    {
        return DB::table('sample_data')
            ->join('mcriterias', 'sample_data.criteria_id', '=', 'mcriterias.id')
            ->join('malternatives', 'sample_data.alternative_id', '=', 'malternatives.id')
            ->orderBy('alternative_id', 'asc')
            ->select('*')
            ->get();
    }

    public function new_object()
    {
        $data = $this->sample();
        $sample = [];
        foreach ($data as $t) {
            if (!isset($sample[$t['kode_alternatif']])) {
                $sample[$t['kode_alternatif']] = [];
            }
            if (!isset($sample[$t['kode_alternatif']][$t['kode_kriteria']])) {
                $sample[$t['kode_alternatif']][$t['kode_kriteria']] = [];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['id_data'] = $t['id_data'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['nilai'] = $t['nilai'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['id_kriteria'] = $t['id_kriteria'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['jenis'] = $t['jenis'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['kode_kriteria'] = $t['kode_kriteria'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['nama_alternatif'] = $t['nama_alternatif'];
                $sample[$t['kode_alternatif']][$t['kode_kriteria']]['bobot'] = $t['bobot'];
            }
            $nama_kriteria[] = $t['nama_kriteria'];
            $kriterias[] = $t['kode_kriteria'];
            $alternatifs[] = $t['nama_alternatif'];
        }
    }
}
