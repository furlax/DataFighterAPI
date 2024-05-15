<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_utilisateur')->insert([
            'uti_no' => 1,
            'uti_username' => 'admin',
            'uti_role' => 'admin',
            'uti_email' => 'admin@demo.com',
            'uti_password' => Hash::make('admin'),
            'uti_per_no' => 1,
            # ajouter pre_no dans la table pro_utilisateur
        ]);

        DB::table('pro_utilisateur')->insert([
            'uti_no' => 2,
            'uti_username' => 'user',
            'uti_role' => 'user',
            'uti_email' => 'user@demo.com',
            'uti_password' => Hash::make('user'),
            'uti_per_no' => 2,
        ]);
    }
}
