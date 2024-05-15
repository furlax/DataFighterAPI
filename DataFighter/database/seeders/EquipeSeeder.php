<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_equipe')->insert([
            'equ_no' => 1,
            'equ_nom' => 'B-team',
            'equ_anneedebut' => '2021-01-01',
            'equ_anneefin' => null,
            'equ_per_no' => 3,
        ]);

        DB::table('pro_equipe')->insert([
            'equ_no' => 2,
            'equ_nom' => 'A-team',
            'equ_anneedebut' => '2021-02-03',
            'equ_anneefin' => null,
            'equ_per_no' => 4,
        ]);

        DB::table('pro_equipe')->insert([
            'equ_no' => 3,
            'equ_nom' => 'C-team',
            'equ_anneedebut' => '2022-05-28',
            'equ_anneefin' => null,
            'equ_per_no' => 5,
        ]);

        DB::table('pro_equipe')->insert([
            'equ_no' => 4,
            'equ_nom' => 'D-team',
            'equ_anneedebut' => '2022-07-15',
            'equ_anneefin' => null,
            'equ_per_no' => 6,
        ]);
    }
}
