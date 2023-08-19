<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class McriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'code_criteria' => 'C1',
                'name_criteria' => 'Legalitas',
                'value_criteria' => 0.30,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'code_criteria' => 'C2',
                'name_criteria' => 'Investasi',
                'value_criteria' => 0.20,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'code_criteria' => 'C3',
                'name_criteria' => 'Tenaga Kerja',
                'value_criteria' => 0.25,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'code_criteria' => 'C4',
                'name_criteria' => 'Nilai Bahan Baku',
                'value_criteria' => 0.10,
                'type_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'code_criteria' => 'C5',
                'name_criteria' => 'Nilai Produksi',
                'value_criteria' => 0.15,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $v) {
            \App\Models\Mcriteria::create($v);
        }
    }
}
