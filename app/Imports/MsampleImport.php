<?php

namespace App\Imports;

use App\Models\Msample;
use Maatwebsite\Excel\Concerns\ToModel;

class MsampleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Msample([
            'code' => $row[0],
            'value' => $row[1],
            'type_id' => $row[2]
        ]);
    }
}
