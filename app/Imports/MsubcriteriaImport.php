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
            'code_subcriteria' => $row[0],
            'name_subcriteria' => $row[1],
            'value_subcriteria' => $row[2],
            'criteria_id' => $row[3]
        ]);
    }
}
