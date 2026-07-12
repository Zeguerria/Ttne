<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('parametres')->insert([

    // AUCUN
    [
        'id' => 1,
        'code' => 'AUCUN',
        'libelle' => 'AUCUN',
        'description' => 'AUCUN',
        'type_parametre_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],

    // ==========================
    // STATUT UTILISATEUR
    // ==========================

    [
        'id' => 2,
        'code' => 'S-U-ATTENTE',
        'libelle' => 'Attente',
        'description' => 'Statut utilisateur en attente de validation',
        'type_parametre_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],

    [
        'id' => 3,
        'code' => 'S-U-ACCEPTE',
        'libelle' => 'Accepté',
        'description' => 'Utilisateur accepté',
        'type_parametre_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],

    [
        'id' => 4,
        'code' => 'S-U-REFUSE',
        'libelle' => 'Refusé',
        'description' => 'Utilisateur refusé',
        'type_parametre_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],

    // ==========================
    // TYPE DE PIECE
    // ==========================

    [
        'id' => 5,
        'code' => 'T-PERMIS',
        'libelle' => 'Permis',
        'description' => 'Permis de conduire',
        'type_parametre_id' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],

    [
        'id' => 6,
        'code' => 'T-PASSEPORT',
        'libelle' => 'Passeport',
        'description' => 'Passeport',
        'type_parametre_id' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],

]);
    }
}
