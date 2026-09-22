<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_parametres')->insert([
            // ==========================================================
            // AUCUN
            // ==========================================================
            [
                'id' => 1,
                'code' => 'AUCUN',
                'libelle' => 'AUCUN',
                'description' => 'Aucun paramètre',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // STATUT UTILISATEUR
            // ==========================================================
            [
                'id' => 2,
                'code' => 'STATUT-UTILISATEUR',
                'libelle' => 'Statut utilisateur',
                'description' => 'Les statuts des utilisateurs',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // TYPE DE PIECE
            // ==========================================================
            [
                'id' => 3,
                'code' => 'TYPE-PIECE',
                'libelle' => 'Type de pièce',
                'description' => 'Les différents types de pièces d’identité',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // MODE DE DISTRIBUTION
            // ==========================================================
            [
                'id' => 4,
                'code' => 'MODE-DISTRIBUTION',
                'libelle' => 'Mode de distribution',
                'description' => 'Les différents modes de distribution des cotisations du groupe',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // VALIDATION MEMBRE
            // ==========================================================
            [
                'id' => 5,
                'code' => 'VALIDATION-MEMBRE',
                'libelle' => 'Validation membre',
                'description' => 'Les règles de validation des demandes d’adhésion au groupe',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // VISIBILITE GROUPE
            // ==========================================================
            [
                'id' => 6,
                'code' => 'VISIBILITE-GROUPE',
                'libelle' => 'Visibilité du groupe',
                'description' => 'Les niveaux de visibilité et d’accès aux groupes',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // STATUT GROUPE
            // ==========================================================
            [
                'id' => 7,
                'code' => 'STATUT-GROUPE',
                'libelle' => 'Statut du groupe',
                'description' => 'Les différents statuts du cycle de vie d’un groupe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
