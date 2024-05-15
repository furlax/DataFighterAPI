<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_prediction')->insert([
            'pre_no' => 1,
            'pre_comb_no' => 1,
            'pre_choix' => 1,
            'pre_uti_no' => 1,
            'pre_com_no' => 1,
        ]);

        DB::table('pro_prediction')->insert([
            'pre_no' => 2,
            'pre_comb_no' => 1,
            'pre_choix' => 0,
            'pre_uti_no' => 2,
            'pre_com_no' => 1,
        ]);

        DB::table('pro_prediction')->insert([
            'pre_no' => 3,
            'pre_comb_no' => 1,
            'pre_choix' => 1,
            'pre_uti_no' => 1,
            'pre_com_no' => 1,
        ]);

        DB::table('pro_prediction')->insert([
            'pre_no' => 4,
            'pre_comb_no' => 2,
            'pre_choix' => 0,
            'pre_uti_no' => 2,
            'pre_com_no' => 2,
        ]);

        DB::table('pro_prediction')->insert([
            'pre_no' => 5,
            'pre_comb_no' => 2,
            'pre_choix' => 1,
            'pre_uti_no' => 2,
            'pre_com_no' => 2,
        ]);

        DB::table('pro_prediction')->insert([
            'pre_no' => 6,
            'pre_comb_no' => 2,
            'pre_choix' => 0,
            'pre_uti_no' => 2,
            'pre_com_no' => 2,
        ]);
    }
}
