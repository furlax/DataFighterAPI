<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_statistique')->insert([
            'sta_resultat' => 1,
            'sta_point' => 120,
            'sta_duree' => 3,
            'sta_ko' => true,
            'sta_tko' => false,
            'sta_soumission' => false,
            'sta_draw' => false,
            'sta_coupdonner' => 50,
            'sta_coupreçu' => 30,
            'sta_comb_no' => 1,
            'sta_com_no' => 1,
        ]); 

        DB::table('pro_statistique')->insert([
            'sta_resultat' => 1,
            'sta_point' => 120,
            'sta_duree' => 3,
            'sta_ko' => true,
            'sta_tko' => false,
            'sta_soumission' => false,
            'sta_draw' => false,
            'sta_coupdonner' => 50,
            'sta_coupreçu' => 30,
            'sta_comb_no' => 2,
            'sta_com_no' => 2,
        ]);

        DB::table('pro_statistique')->insert([
            'sta_resultat' => 1,
            'sta_point' => 120,
            'sta_duree' => 3,
            'sta_ko' => true,
            'sta_tko' => false,
            'sta_soumission' => false,
            'sta_draw' => false,
            'sta_coupdonner' => 50,
            'sta_coupreçu' => 30,
            'sta_comb_no' => 3,
            'sta_com_no' => 3,
        ]);
    }
}
