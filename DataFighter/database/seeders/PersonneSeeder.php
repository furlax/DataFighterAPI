<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_personne')->insert([
            'per_no' => 1,
            'per_nom' => 'Doe',
            'per_prenom' => 'John',
            'per_datenaissance' => '1990-01-01',
            'per_pays' => 'USA', 
        ]);

        DB::table('pro_personne')->insert([
            'per_no' => 2,
            'per_nom' => 'Doe',
            'per_prenom' => 'Robert',
            'per_pays' => 'Russia',
            'per_datenaissance' => '1990-01-01', // '1990-01-01 
        ]);

        DB::table('pro_personne')->insert([
            'per_no' => 3,
            'per_nom' => 'Mcgregor',
            'per_prenom' => 'Conor',
            'per_pays' => 'Ireland',
            'per_datenaissance' => '1990-01-01', // '1990-01-01  
        ]);

        DB::table('pro_personne')->insert([
            'per_no' => 4,
            'per_nom' => 'Nurmagomedov',
            'per_prenom' => 'Khabib',
            'per_pays' => 'Russia',
            'per_datenaissance' => '1990-01-01', // '1990-01-01  
        ]);

        DB::table('pro_personne')->insert([
            'per_no' => 5,
            'per_nom' => 'Jones',
            'per_prenom' => 'Jon',
            'per_pays' => 'USA',
            'per_datenaissance' => '1990-01-01', // '1990-01-01  
        ]);

        DB::table('pro_personne')->insert([
            'per_no' => 6,
            'per_nom' => 'Silva',
            'per_prenom' => 'Anderson',
            'per_pays' => 'Brazil',
            'per_datenaissance' => '1990-01-01', // '1990-01-01  
        ]);
    }
}
