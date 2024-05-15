<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombattantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_combattant')->insert([
            'comb_no' => 1,
            'comb_poids' => 70,
            'comb_niveau' => 'Pro',
            'comb_sexe' => 'M',
            'comb_taille' => 177,
            'comb_typ_no' => 1,
            'comb_per_no' => 3,
        ]);


        DB::table('pro_combattant')->insert([
            'comb_no' => 2,
            'comb_poids' => 80,
            'comb_niveau' => 'Pro',
            'comb_sexe' => 'M',
            'comb_taille' => 185,
            'comb_typ_no' => 2,
            'comb_per_no' => 4,
        ]);

        DB::table('pro_combattant')->insert([
            'comb_no' => 3,
            'comb_poids' => 68,
            'comb_niveau' => 'Pro',
            'comb_sexe' => 'M',
            'comb_taille' => 168,
            'comb_typ_no' => 3,
            'comb_per_no' => 5,
        ]);

        DB::table('pro_combattant')->insert([
            'comb_no' => 4,
            'comb_poids' => 79,
            'comb_niveau' => 'Pro',
            'comb_sexe' => 'M',
            'comb_taille' => 172,
            'comb_typ_no' => 4,
            'comb_per_no' => 6,
        ]);
    }
}
