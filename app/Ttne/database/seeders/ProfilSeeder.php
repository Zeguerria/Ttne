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
            ['id'=>1, 'code'=> "SIMPLE-USER", 'libelle'=>"Users", 'description'=>"En attente de validation",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            ['id'=>2, 'code'=> "MEMBRE-COMMUNAUTE", 'libelle'=>"Membre", 'description'=>"Membre de la communauté",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            ['id'=>3, 'code'=> "OPERATEUR", 'libelle'=>"Opérateur", 'description'=>"Operateurs",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],



        ]);
    }
}
