<?php

namespace App\Imports;

use App\Models\Malternative;
use Maatwebsite\Excel\Concerns\ToModel;

class MalternativeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Malternative([
            'code_alternative' => $row[0],
            'name_alternative' => $row[1]
        ]);
    }
}
