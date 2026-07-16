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
        'code' => 'SIMPLE-USER',
        'libelle' => 'Users',
        'description' => 'En attente de validation',
        'est_validateur' => false,
        'is_active' => true,
        'supprimer' => false,
        'created_at' => '2025-09-03 20:02:36',
        'updated_at' => '2025-09-03 20:02:36',
    ],

    [
        'id' => 2,
        'code' => 'MEMBRE-COMMUNAUTE',
        'libelle' => 'Membre',
        'description' => 'Membre de la communauté',
        'est_validateur' => false,
        'is_active' => true,
        'supprimer' => false,
        'created_at' => '2025-09-03 20:02:36',
        'updated_at' => '2025-09-03 20:02:36',
    ],

    [
        'id' => 3,
        'code' => 'OPERATEUR',
        'libelle' => 'Opérateur',
        'description' => 'Opérateurs',
        'est_validateur' => true,
        'is_active' => true,
        'supprimer' => false,
        'created_at' => '2025-09-03 20:02:36',
        'updated_at' => '2025-09-03 20:02:36',
    ],

    [
        'id' => 4,
        'code' => 'ADMIN',
        'libelle' => 'Administrateur',
        'description' => 'Administrateur plateforme',
        'est_validateur' => true,
        'is_active' => true,
        'supprimer' => false,
        'created_at' => '2025-09-03 20:02:36',
        'updated_at' => '2025-09-03 20:02:36',
    ],

]);
    }
}
