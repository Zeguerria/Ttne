<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parametres')->insert([

            // ==========================================================
            // AUCUN
            // ==========================================================
            [
                'id' => 1,
                'code' => 'AUCUN',
                'libelle' => 'AUCUN',
                'description' => 'Aucun paramètre',
                'type_parametre_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // STATUT UTILISATEUR
            // ==========================================================
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

            // ==========================================================
            // TYPE DE PIECE
            // ==========================================================
            [
                'id' => 5,
                'code' => 'T-CNI',
                'libelle' => 'Carte nationale d’identité',
                'description' => 'Carte nationale d’identité',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 6,
                'code' => 'T-PASSEPORT',
                'libelle' => 'Passeport',
                'description' => 'Passeport national ou étranger',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 7,
                'code' => 'T-PERMIS',
                'libelle' => 'Permis de conduire',
                'description' => 'Permis de conduire',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 8,
                'code' => 'T-CARTE-SEJOUR',
                'libelle' => 'Carte de séjour',
                'description' => 'Titre ou carte de séjour',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 9,
                'code' => 'T-CARTE-CONSULAIRE',
                'libelle' => 'Carte consulaire',
                'description' => 'Carte consulaire délivrée par une représentation diplomatique',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 10,
                'code' => 'T-CARTE-ETUDIANT',
                'libelle' => 'Carte étudiant',
                'description' => 'Carte ou document officiel d’étudiant',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 11,
                'code' => 'T-CARTE-REFUGIE',
                'libelle' => 'Carte de réfugié',
                'description' => 'Document officiel attestant du statut de réfugié',
                'type_parametre_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // MODE DE DISTRIBUTION
            // ==========================================================
            [
                'id' => 12,
                'code' => 'M-D-TOUR',
                'libelle' => 'Tour de rôle',
                'description' => 'Chaque membre reçoit la cagnotte à son tour selon l’ordre défini du groupe',
                'type_parametre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 13,
                'code' => 'M-D-TIRAGE',
                'libelle' => 'Tirage au sort',
                'description' => 'Le bénéficiaire de la cotisation est déterminé par tirage au sort',
                'type_parametre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 14,
                'code' => 'M-D-DECISION',
                'libelle' => 'Décision du groupe',
                'description' => 'Le bénéficiaire est déterminé selon les règles ou la décision du groupe',
                'type_parametre_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // VALIDATION MEMBRE
            // ==========================================================
            [
                'id' => 15,
                'code' => 'V-M-AUTOMATIQUE',
                'libelle' => 'Automatique',
                'description' => 'La demande d’adhésion est automatiquement acceptée selon les règles du groupe',
                'type_parametre_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 16,
                'code' => 'V-M-CREATEUR',
                'libelle' => 'Validation par le créateur',
                'description' => 'Le créateur du groupe valide ou refuse les demandes d’adhésion',
                'type_parametre_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // VISIBILITE DU GROUPE
            // ==========================================================
            [
                'id' => 17,
                'code' => 'V-G-PUBLIC',
                'libelle' => 'Public',
                'description' => 'Le groupe est visible par tous les utilisateurs',
                'type_parametre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 18,
                'code' => 'V-G-PRIVE',
                'libelle' => 'Privé',
                'description' => 'Le groupe est visible uniquement selon les règles d’accès définies',
                'type_parametre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 19,
                'code' => 'V-G-SECRET',
                'libelle' => 'Secret',
                'description' => 'Le groupe n’est pas visible dans les recherches publiques et nécessite une invitation',
                'type_parametre_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ==========================================================
            // STATUT GROUPE
            // ==========================================================
            [
                'id' => 20,
                'code' => 'S-G-BROUILLON',
                'libelle' => 'Brouillon',
                'description' => 'Le groupe est en cours de création et n’est pas encore actif',
                'type_parametre_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 21,
                'code' => 'S-G-ACTIF',
                'libelle' => 'Actif',
                'description' => 'Le groupe fonctionne normalement',
                'type_parametre_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 22,
                'code' => 'S-G-SUSPENDU',
                'libelle' => 'Suspendu',
                'description' => 'Les opérations du groupe sont temporairement suspendues',
                'type_parametre_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 23,
                'code' => 'S-G-TERMINE',
                'libelle' => 'Terminé',
                'description' => 'Le cycle du groupe est arrivé à son terme',
                'type_parametre_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
