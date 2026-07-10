<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         //
         DB::table('type_parametres')->insert([
            ['id'=>1, 'code'=> "AUCUN", 'libelle'=>"AUCUN", 'description'=>"AUCUN",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            //TYPE DE PIECE D'IDENTITE DEBUT
                ['id'=>2, 'code'=> "TYPE DE PIECE", 'libelle'=>"Type de piece ", 'description'=>"l'ensemble des types de piàce",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            //TYPE DE PIECE D'IDENTITE FIN
            // ['id'=>3, 'code'=> "P-QUALITE", 'libelle'=>"Qualité ", 'description'=>"Les qualités du produit",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            // ['id'=>4, 'code'=> "E-PAIEMENT", 'libelle'=>"Paiement", 'description'=>"Les états de paiement",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            // ['id'=>5, 'code'=>"B-BOUTIQUE", 'libelle'=>"Boutique", 'description'=>"Statuts des boutiques",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            // ['id'=>6, 'code'=>"A-ABONNEMENT", 'libelle'=>"Abonnement", 'description'=>"Statuts des abonnements",'created_at'=>now(),'updated_at'=>now()],
            // UNITE DE LA DUREE POUR LES TARIF

            // ['id'=>7, 'code'=>"U-DUREE", 'libelle'=>"Unité Durée", 'description'=>"Les Unité de duréee pour les abonnements",'created_at'=>now(),'updated_at'=>now()],
            // GERER LES TYPE D'OFFRE (ABONNEMENT OU CREATION)
            // ['id'=>8, 'code'=>"T-OFFRE", 'libelle'=>"Offres", 'description'=>"Les differents offres",'created_at'=>now(),'updated_at'=>now()],
            // ['id'=>9, 'code'=>"T-PIECE", 'libelle'=>"Type de piece", 'description'=>"Les differents types de pieces",'created_at'=>now(),'updated_at'=>now()],
            // GERER LES STATUT DE DEMANDE

            // ['id'=>10, 'code'=>"T-DEMANDE", 'libelle'=>"Type de demande", 'description'=>"Les differents types de demande",'created_at'=>now(),'updated_at'=>now()],

            // ['id'=>3, 'code'=> "LC", 'libelle'=>"Les communes", 'description'=>"l'ensemble des communes"],
        ]);
    }
}
