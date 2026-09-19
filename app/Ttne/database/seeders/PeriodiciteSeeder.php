<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PeriodiciteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('periodicites')->insert([

            // AUCUN
            [
                'id' => 1,
                'nom' => 'Quotidienne',
                'code' => 'QUOTIDIENNE',
                'unite' => 'jour',
                'valeur' => 1,
                'description' => 'Un Jour',
                'active' => true,
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
                'description' => 'Une Semaine',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => "3",
                'nom' => 'Bimensuelle',
                'code' => 'BIMENSUELLE',
                'unite' => 'semaine',
                'valeur' => 2,
                'description' => '2 Semaines , soit 14 Jours',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => "4",
                'nom' => 'Mensuelle',
                'code' => 'BIMENSUELLE',
                'unite' => 'mois',
                'valeur' => 1,
                'description' => '1 MOIS',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => "5",
                'nom' => 'Trimestrielle',
                'code' => 'TRIMESTRIELLE',
                'unite' => 'mois',
                'valeur' => 3,
                'description' => '3 MOIS',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => "6",
                'nom' => 'Semestrielle',
                'code' => 'SEMESTRIELLE',
                'unite' => 'mois',
                'valeur' => 6,
                'description' => '6 MOIS',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => "7",
                'nom' => 'Annuelle',
                'code' => 'ANNUELLE',
                'unite' => 'année',
                'valeur' => 1,
                'description' => '1 An',
                'active' => true,
                'active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],




        ]);
    }
}
