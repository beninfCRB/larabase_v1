<?php

namespace App\Imports;

use App\Models\SampleData;
use Maatwebsite\Excel\Concerns\ToModel;

class SampleDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SampleData([
            //
        ]);
    }
}
