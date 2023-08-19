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
            'alternative_id' => $row[0],
            'criteria_id' => $row[1],
            'value_sample_data' => $row[2],
        ]);
    }
}
