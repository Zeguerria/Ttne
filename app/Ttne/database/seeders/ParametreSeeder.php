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
            ['id'=>1, 'code'=> "AUCUN", 'libelle'=>"AUCUN", 'description'=>"AUCUN",'type_parametre_id'=>1,'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            //PIECE D'IDENTITE DEBUT
                ['id'=>2, 'code'=> "T-PERMIS", 'libelle'=>"Permis ",'type_parametre_id'=>2, 'description'=>"Permis de conduire",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
                ['id'=>3, 'code'=> "T-PASSPORT", 'libelle'=>"Passport ",'type_parametre_id'=>2, 'description'=>"Passport",'created_at'=>"2025-09-03 20:02:36",'updated_at'=>"2025-09-03 20:02:36"],
            //TPIECE D'IDENTITE FIN

        ]);
    }
}
