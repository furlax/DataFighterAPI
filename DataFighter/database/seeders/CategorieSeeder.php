<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_categorie')->insert([
            'cat_no' => 1,
            'cat_nom' => 'Poids Lourd',
            'cat_poidsmin' => 96,
            'cat_poidsmax' => 120,
        ]);

        DB::table('pro_categorie')->insert([
            'cat_no' => 2,
            'cat_nom' => 'Poids Léger',
            'cat_poidsmin' => 66,
            'cat_poidsmax' => 70,
        ]);

        DB::table('pro_categorie')->insert([
            'cat_no' => 3,
            'cat_nom' => 'Poids Moyen',
            'cat_poidsmin' => 77,
            'cat_poidsmax' => 84,
        ]);
    }
}
