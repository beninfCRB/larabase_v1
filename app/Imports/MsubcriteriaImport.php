<?php

namespace App\Imports;

use App\Models\Msubcriteria;
use Maatwebsite\Excel\Concerns\ToModel;

class MsubcriteriaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Msubcriteria([
            'code' => $row[0],
            'name' => $row[1],
            'value' => $row[2],
            'criteria_id' => $row[3]
        ]);
    }
}
