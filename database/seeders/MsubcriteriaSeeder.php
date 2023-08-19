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
            ['id' => 1, 'code_subcriteria' => 'SC1', 'name_subcriteria' => 'NIB', 'value_subcriteria' => 1, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'code_subcriteria' => 'SC2', 'name_subcriteria' => 'NIB,PIRT', 'value_subcriteria' => 2.5, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'code_subcriteria' => 'SC3', 'name_subcriteria' => 'NIB,PIRT,HALAL', 'value_subcriteria' => 4.5, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'code_subcriteria' => 'SC4', 'name_subcriteria' => 'NIB,PIRT,HALAL,N.C', 'value_subcriteria' => 7, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 5, 'code_subcriteria' => 'SC5', 'name_subcriteria' => 'NIB,PIRT,HALAL,N.C,HAKI', 'value_subcriteria' => 10, 'criteria_id' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 6, 'code_subcriteria' => 'SC6', 'name_subcriteria' => '1.000000 s/d 50.000.000', 'value_subcriteria' => 1, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 7, 'code_subcriteria' => 'SC7', 'name_subcriteria' => '50.000.000 s/d 250.000.000', 'value_subcriteria' => 1.5, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 8, 'code_subcriteria' => 'SC8', 'name_subcriteria' => '250.000.000 s/d 500.000.000', 'value_subcriteria' => 2, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 9, 'code_subcriteria' => 'SC9', 'name_subcriteria' => '500.000.000 s/d 1.000.000.000', 'value_subcriteria' => 2.5, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 10, 'code_subcriteria' => 'SC10', 'name_subcriteria' => '1.000.000.000 s/d 5.000.000.000', 'value_subcriteria' => 3, 'criteria_id' => 2, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 11, 'code_subcriteria' => 'SC11', 'name_subcriteria' => '1 s/d 5', 'value_subcriteria' => 1, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 12, 'code_subcriteria' => 'SC12', 'name_subcriteria' => '6 s/d 19', 'value_subcriteria' => 1.5, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 13, 'code_subcriteria' => 'SC13', 'name_subcriteria' => '20 s/d 39', 'value_subcriteria' => 2, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 14, 'code_subcriteria' => 'SC14', 'name_subcriteria' => '40 s/d 60', 'value_subcriteria' => 2.5, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 15, 'code_subcriteria' => 'SC15', 'name_subcriteria' => '61 s/d 99', 'value_subcriteria' => 3, 'criteria_id' => 3, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 16, 'code_subcriteria' => 'SC16', 'name_subcriteria' => '<5.000.000', 'value_subcriteria' => 1, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 17, 'code_subcriteria' => 'SC17', 'name_subcriteria' => '5.000.000 s/d 25.000.000', 'value_subcriteria' => 1.5, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 18, 'code_subcriteria' => 'SC18', 'name_subcriteria' => '25.000.000 s/d 100.000.000', 'value_subcriteria' => 2, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 19, 'code_subcriteria' => 'SC19', 'name_subcriteria' => '100.0000.000 s/d 500.000.000', 'value_subcriteria' => 2.5, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 20, 'code_subcriteria' => 'SC20', 'name_subcriteria' => '>500.000000', 'value_subcriteria' => 3, 'criteria_id' => 4, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 21, 'code_subcriteria' => 'SC21', 'name_subcriteria' => '< 50.000.000', 'value_subcriteria' => 1, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 22, 'code_subcriteria' => 'SC22', 'name_subcriteria' => '50.000.000 s/d 100.000.000', 'value_subcriteria' => 1.5, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 23, 'code_subcriteria' => 'SC23', 'name_subcriteria' => '100.000.000 s/d 500.000.000', 'value_subcriteria' => 2, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 24, 'code_subcriteria' => 'SC24', 'name_subcriteria' => '500.000.000 s/d 1.000.000.000', 'value_subcriteria' => 2.5, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 25, 'code_subcriteria' => 'SC25', 'name_subcriteria' => '> 1.000.000.000', 'value_subcriteria' => 3, 'criteria_id' => 5, 'created_at' => now(), 'updated_at' => now(),],
        ];

        foreach ($data as $v) {
            \App\Models\Msubcriteria::create($v);
        }
    }
}
