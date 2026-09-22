<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodiciteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periodicites')->insert([
            [
                'id' => 1,
                'nom' => 'Quotidienne',
                'code' => 'QUOTIDIENNE',
                'unite' => 'jour',
                'valeur' => 1,
                'description' => 'Un jour',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'nom' => 'Hebdomadaire',
                'code' => 'HEBDOMADAIRE',
                'unite' => 'semaine',
                'valeur' => 1,
                'description' => 'Une semaine',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'nom' => 'Bimensuelle',
                'code' => 'BIMENSUELLE',
                'unite' => 'semaine',
                'valeur' => 2,
                'description' => '2 semaines, soit 14 jours',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'nom' => 'Mensuelle',
                'code' => 'MENSUELLE',
                'unite' => 'mois',
                'valeur' => 1,
                'description' => '1 mois',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 5,
                'nom' => 'Trimestrielle',
                'code' => 'TRIMESTRIELLE',
                'unite' => 'mois',
                'valeur' => 3,
                'description' => '3 mois',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 6,
                'nom' => 'Semestrielle',
                'code' => 'SEMESTRIELLE',
                'unite' => 'mois',
                'valeur' => 6,
                'description' => '6 mois',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 7,
                'nom' => 'Annuelle',
                'code' => 'ANNUELLE',
                'unite' => 'année',
                'valeur' => 1,
                'description' => '1 an',
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
