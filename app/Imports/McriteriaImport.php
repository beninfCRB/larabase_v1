<?php

namespace App\Imports;

use App\Models\Mcriteria;
use Maatwebsite\Excel\Concerns\ToModel;

class McriteriaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mcriteria([
            'code' => $row[0],
            'name' => $row[1],
            'value' => $row[2],
            'type_id' => $row[3]
        ]);
    }
}