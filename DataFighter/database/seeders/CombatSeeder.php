<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_combat')->insert([
            'com_no' => 1,
            'com_lieu' => 'Geneva',
            'com_heuredebut' => '20:15:00',
            'com_heurefin' => '20:30:00',
            'com_cat_no' => 1,
            'com_org_no' => 1
        ]);

        DB::table('pro_combat')->insert([
            'com_no' => 2,
            'com_lieu' => 'Lausanne',
            'com_heuredebut' => '20:15:00',
            'com_heurefin' => '20:30:00',
            'com_cat_no' => 2,
            'com_org_no' => 1
        ]);

        DB::table('pro_combat')->insert([
            'com_no' => 3,
            'com_lieu' => 'Zurich',
            'com_heuredebut' => '20:15:00',
            'com_heurefin' => '20:30:00',
            'com_cat_no' => 3,
            'com_org_no' => 1
        ]);
    }
}
