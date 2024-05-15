<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_type_sport')->insert([
            'typ_no' => 1,
            'typ_nom' => 'Lutteur',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 2,
            'typ_nom' => 'Boxe',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 3,
            'typ_nom' => 'Judo',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 4,
            'typ_nom' => 'Karaté',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 5,
            'typ_nom' => 'Taekwondo',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 6,
            'typ_nom' => 'Jiu-jitsu brésilien',
        ]);

        DB::table('pro_type_sport')->insert([
            'typ_no' => 7,
            'typ_nom' => 'Grappling',
        ]);
    }
}
