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
            ['id' => 1, 'code' => 'A1', 'name' => 'Noval', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'code' => 'A2', 'name' => 'PD Barokah', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'code' => 'A3', 'name' => 'HD (Hoyong Deui)', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'code' => 'A4', 'name' => 'Rai Raka', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 5, 'code' => 'A5', 'name' => 'Guna Asih', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 6, 'code' => 'A6', 'name' => 'Pedoo Majalengka', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 7, 'code' => 'A7', 'name' => 'Raja Bolen', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 8, 'code' => 'A8', 'name' => 'Kataji', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 9, 'code' => 'A9', 'name' => 'Abah Geyot', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 10, 'code' => 'A10', 'name' => 'Dahlia', 'created_at' => now(), 'updated_at' => now(),],
        ];

        foreach ($data as $v) {
            \App\Models\Malternative::create($v);
        }
    }
}
