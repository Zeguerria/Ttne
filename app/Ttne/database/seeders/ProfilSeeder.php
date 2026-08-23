<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('profils')->insert([
            [
                'id' => 1,
                'code' => 'MEMBRE-COMMUNAUTE',
                'libelle' => 'Membre',
                'description' => 'Membre de la communauté dont l’adhésion a été validée.',
                'est_validateur' => false,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'code' => 'OPERATEUR',
                'libelle' => 'Opérateur',
                'description' => 'Gestion des appels, demandes, réclamations et orientation des dossiers.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'code' => 'JURISTE',
                'libelle' => 'Juriste',
                'description' => 'Analyse et traitement des dossiers et problématiques à caractère juridique.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'code' => 'RH',
                'libelle' => 'Ressources Humaines',
                'description' => 'Gestion administrative et opérationnelle des ressources humaines.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 5,
                'code' => 'DRH',
                'libelle' => 'Directeur des Ressources Humaines',
                'description' => 'Supervision et direction de la gestion des ressources humaines.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 6,
                'code' => 'DIRECTEUR-GENERAL',
                'libelle' => 'Directeur Général',
                'description' => 'Supervision générale de l’organisation et validation des décisions stratégiques.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 7,
                'code' => 'ADMIN',
                'libelle' => 'Administrateur',
                'description' => 'Administration fonctionnelle et gestion de la plateforme.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 8,
                'code' => 'DEVELOPPEUR',
                'libelle' => 'Développeur',
                'description' => 'Développement, maintenance, correction et évolution de l’application.',
                'est_validateur' => false,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 9,
                'code' => 'SUPER-DEVELOPPEUR',
                'libelle' => 'Super Développeur',
                'description' => 'Supervision technique, maintenance avancée et gestion technique de l’application.',
                'est_validateur' => true,
                'is_active' => true,
                'supprimer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
