<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'alternative_id' => '1', 'criteria_id' => '1', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'alternative_id' => '1', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'alternative_id' => '1', 'criteria_id' => '3', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'alternative_id' => '1', 'criteria_id' => '4', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 5, 'alternative_id' => '1', 'criteria_id' => '5', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 6, 'alternative_id' => '2', 'criteria_id' => '1', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 7, 'alternative_id' => '2', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 8, 'alternative_id' => '2', 'criteria_id' => '3', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 9, 'alternative_id' => '2', 'criteria_id' => '4', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 10, 'alternative_id' => '2', 'criteria_id' => '5', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 11, 'alternative_id' => '3', 'criteria_id' => '1', 'value' => 4.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 12, 'alternative_id' => '3', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 13, 'alternative_id' => '3', 'criteria_id' => '3', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 14, 'alternative_id' => '3', 'criteria_id' => '4', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 15, 'alternative_id' => '3', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 16, 'alternative_id' => '4', 'criteria_id' => '1', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 17, 'alternative_id' => '4', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 18, 'alternative_id' => '4', 'criteria_id' => '3', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 19, 'alternative_id' => '4', 'criteria_id' => '4', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 20, 'alternative_id' => '4', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 21, 'alternative_id' => '5', 'criteria_id' => '1', 'value' => 4.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 22, 'alternative_id' => '5', 'criteria_id' => '2', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 23, 'alternative_id' => '5', 'criteria_id' => '3', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 24, 'alternative_id' => '5', 'criteria_id' => '4', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 25, 'alternative_id' => '5', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 26, 'alternative_id' => '6', 'criteria_id' => '1', 'value' => 4.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 27, 'alternative_id' => '6', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 28, 'alternative_id' => '6', 'criteria_id' => '3', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 29, 'alternative_id' => '6', 'criteria_id' => '4', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 30, 'alternative_id' => '6', 'criteria_id' => '5', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 31, 'alternative_id' => '7', 'criteria_id' => '1', 'value' => 4.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 32, 'alternative_id' => '7', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 33, 'alternative_id' => '7', 'criteria_id' => '3', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 34, 'alternative_id' => '7', 'criteria_id' => '4', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 35, 'alternative_id' => '7', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 36, 'alternative_id' => '8', 'criteria_id' => '1', 'value' => 4.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 37, 'alternative_id' => '8', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 38, 'alternative_id' => '8', 'criteria_id' => '3', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 39, 'alternative_id' => '8', 'criteria_id' => '4', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 40, 'alternative_id' => '8', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 41, 'alternative_id' => '9', 'criteria_id' => '1', 'value' => 10, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 42, 'alternative_id' => '9', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 43, 'alternative_id' => '9', 'criteria_id' => '3', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 44, 'alternative_id' => '9', 'criteria_id' => '4', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 45, 'alternative_id' => '9', 'criteria_id' => '5', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 46, 'alternative_id' => '10', 'criteria_id' => '1', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 47, 'alternative_id' => '10', 'criteria_id' => '2', 'value' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 48, 'alternative_id' => '10', 'criteria_id' => '3', 'value' => 1.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 49, 'alternative_id' => '10', 'criteria_id' => '4', 'value' => 2.5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 50, 'alternative_id' => '10', 'criteria_id' => '5', 'value' => 2, 'created_at' => now(), 'updated_at' => now(),],
        ];

        foreach ($data as $v) {
            \App\Models\SampleData::create($v);
        }
    }
}
