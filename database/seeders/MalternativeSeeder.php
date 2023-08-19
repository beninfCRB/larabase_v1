<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MalternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'code_alternative' => 'A1', 'name_alternative' => 'Noval', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'code_alternative' => 'A2', 'name_alternative' => 'PD Barokah', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'code_alternative' => 'A3', 'name_alternative' => 'HD (Hoyong Deui)', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'code_alternative' => 'A4', 'name_alternative' => 'Rai Raka', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 5, 'code_alternative' => 'A5', 'name_alternative' => 'Guna Asih', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 6, 'code_alternative' => 'A6', 'name_alternative' => 'Pedoo Majalengka', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 7, 'code_alternative' => 'A7', 'name_alternative' => 'Raja Bolen', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 8, 'code_alternative' => 'A8', 'name_alternative' => 'Kataji', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 9, 'code_alternative' => 'A9', 'name_alternative' => 'Abah Geyot', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 10, 'code_alternative' => 'A10', 'name_alternative' => 'Dahlia', 'created_at' => now(), 'updated_at' => now(),],
        ];

        foreach ($data as $v) {
            \App\Models\Malternative::create($v);
        }
    }
}
