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
                'code' => 'C1',
                'name' => 'Legalitas',
                'value' => 0.30,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'code' => 'C2',
                'name' => 'Investasi',
                'value' => 0.20,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'code' => 'C3',
                'name' => 'Tenaga Kerja',
                'value' => 0.25,
                'type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'code' => 'C4',
                'name' => 'Nilai Bahan Baku',
                'value' => 0.10,
                'type_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'code' => 'C5',
                'name' => 'Nilai Produksi',
                'value' => 0.15,
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
