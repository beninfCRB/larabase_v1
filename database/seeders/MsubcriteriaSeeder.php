<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsubcriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'code' => 'SC1', 'name' => 'NIB', 'value' => 1, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'code' => 'SC2', 'name' => 'NIB,PIRT', 'value' => 2.5, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'code' => 'SC3', 'name' => 'NIB,PIRT,HALAL', 'value' => 4.5, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'code' => 'SC4', 'name' => 'NIB,PIRT,HALAL,N.C', 'value' => 7, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 5, 'code' => 'SC5', 'name' => 'NIB,PIRT,HALAL,N.C,HAKI', 'value' => 10, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 6, 'code' => 'SC6', 'name' => '1.000000 s/d 50.000.000', 'value' => 1, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 7, 'code' => 'SC7', 'name' => '50.000.000 s/d 250.000.000', 'value' => 1.5, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 8, 'code' => 'SC8', 'name' => '250.000.000 s/d 500.000.000', 'value' => 2, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 9, 'code' => 'SC9', 'name' => '500.000.000 s/d 1.000.000.000', 'value' => 2.5, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 10, 'code' => 'SC10', 'name' => '1.000.000.000 s/d 5.000.000.000', 'value' => 3, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 11, 'code' => 'SC11', 'name' => '1 s/d 5', 'value' => 1, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 12, 'code' => 'SC12', 'name' => '6 s/d 19', 'value' => 1.5, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 13, 'code' => 'SC13', 'name' => '20 s/d 39', 'value' => 2, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 14, 'code' => 'SC14', 'name' => '40 s/d 60', 'value' => 2.5, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 15, 'code' => 'SC15', 'name' => '61 s/d 99', 'value' => 3, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 16, 'code' => 'SC16', 'name' => '<5.000.000', 'value' => 1, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 17, 'code' => 'SC17', 'name' => '5.000.000 s/d 25.000.000', 'value' => 1.5, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 18, 'code' => 'SC18', 'name' => '25.000.000 s/d 100.000.000', 'value' => 2, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 19, 'code' => 'SC19', 'name' => '100.0000.000 s/d 500.000.000', 'value' => 2.5, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 20, 'code' => 'SC20', 'name' => '>500.000000', 'value' => 3, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 21, 'code' => 'SC21', 'name' => '< 50.000.000', 'value' => 1, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 22, 'code' => 'SC22', 'name' => '50.000.000 s/d 100.000.000', 'value' => 1.5, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 23, 'code' => 'SC23', 'name' => '100.000.000 s/d 500.000.000', 'value' => 2, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 24, 'code' => 'SC24', 'name' => '500.000.000 s/d 1.000.000.000', 'value' => 2.5, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 25, 'code' => 'SC25', 'name' => '> 1.000.000.000', 'value' => 3, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
        ];

        foreach ($data as $v) {
            \App\Models\Msubcriteria::create($v);
        }
    }
}
