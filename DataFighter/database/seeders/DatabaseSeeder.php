<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategorieSeeder::class,
            OrganisationSeeder::class,
            CombatSeeder::class,
            TypesportSeeder::class,
            PersonneSeeder::class,
            EquipeSeeder::class,
            UtilisateurSeeder::class,
            CombattantSeeder::class,
            StatistiqueSeeder::class,
            PredictionSeeder::class,
        ]);
    }
}
