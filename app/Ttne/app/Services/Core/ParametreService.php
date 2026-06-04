<?php

namespace App\Services\Core;

use Exception;
use App\Models\Parametre;
use Illuminate\Support\Facades\DB;

class ParametreService
{
    /*
    |--------------------------------------------------------------------------
    | CREATION
    |--------------------------------------------------------------------------
    */

    public static function store(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | CREATION
            |--------------------------------------------------------------------------
            */

            $parametre = Parametre::create([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'type_parametre_id' => $data['type_parametre_id'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($parametre);

            DB::commit();

            return $parametre;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la création du paramètre : '
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MODIFICATION
    |--------------------------------------------------------------------------
    */

    public static function update(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION
            |--------------------------------------------------------------------------
            */

            $parametre = Parametre::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $parametre->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $parametre->update([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'type_parametre_id' => $data['type_parametre_id'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $parametre,
                $ancienneValeur,
                $parametre->toArray()
            );

            DB::commit();

            return $parametre;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la modification du paramètre : '
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreEnCorbeille(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION
            |--------------------------------------------------------------------------
            */

            $parametre = Parametre::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($parametre->supprimer == 1) {

                throw new Exception(
                    'Ce paramètre est déjà en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $parametre
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille du paramètre : '
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | TOUT METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function toutMettreEnCorbeille()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION
            |--------------------------------------------------------------------------
            */

            $parametres = Parametre::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($parametres->isEmpty()) {

                throw new Exception(
                    'Aucun paramètre à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($parametres as $parametre) {

                CorbeilleService::mettreEnCorbeille(
                    $parametre
                );
            }

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille massive : '
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | METTRE PLUSIEURS ELEMENTS EN CORBEILLE (SELECTION)
    |--------------------------------------------------------------------------
    */

    public static function mettreSelectionEnCorbeille(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES ELEMENTS VALIDES
            |--------------------------------------------------------------------------
            */

            $items = Parametre::whereIn('id', $ids)
                ->where('supprimer', 0)
                ->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucun élément valide à supprimer.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            /*
            |--------------------------------------------------------------------------
            | TRAITEMENT
            |--------------------------------------------------------------------------
            */

            foreach ($items as $item) {

                /*
                |--------------------------------------------------------------------------
                | CORBEILLE (LOGIQUE EXISTANTE CONSERVÉE)
                |--------------------------------------------------------------------------
                */

                CorbeilleService::mettreEnCorbeille($item);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression de la sélection : ' .
                $e->getMessage()
            );
        }
    }
    public static function mettreEnCorbeilleAll()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES ELEMENTS ACTIFS
            |--------------------------------------------------------------------------
            */

            $items = Parametre::where('supprimer', 0)->get();

            if ($items->isEmpty()) {
                throw new Exception('Aucun paramètre à supprimer.');
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            /*
            |--------------------------------------------------------------------------
            | TRAITEMENT
            |--------------------------------------------------------------------------
            */

            foreach ($items as $item) {

                $ancienneValeur = $item->getOriginal();

                // mise à jour soft logique métier
                $item->update([
                    'supprimer' => 1
                ]);

                if ($item->supprimer == 1) {

                    /*
                    |--------------------------------------------------------------------------
                    | HISTORIQUE + CORBEILLE
                    |--------------------------------------------------------------------------
                    */

                    CorbeilleService::mettreEnCorbeille(
                        $item,
                        'mettre en corbeille',
                        $ancienneValeur,
                        $item->toArray()
                    );

                    $count++;

                } else {

                    throw new Exception(
                        "Échec mise de la suppression de ID: " . $item->id
                    );
                }
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur de la suppression globale : " . $e->getMessage()
            );
        }
    }
}
