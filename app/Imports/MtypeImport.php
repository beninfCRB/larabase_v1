<?php

namespace App\Imports;

use App\Models\Mtype;
use Maatwebsite\Excel\Concerns\ToModel;

class MtypeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mtype([
            'code' => $row[0],
            'name' => $row[1]
        ]);
    }
}
