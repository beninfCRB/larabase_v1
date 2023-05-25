<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MtypeSeeder extends Seeder
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
                'code' => 'J1',
                'name' => 'Cost',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'J2',
                'name' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($data as $v) {
            \App\Models\Mtype::create($v);
        }
    }
}
