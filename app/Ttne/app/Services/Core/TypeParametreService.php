<?php

namespace App\Services\Core;

use Exception;
use App\Models\TypeParametre;
use Illuminate\Support\Facades\DB;

class TypeParametreService
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

            $typeparametre = TypeParametre::create([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($typeparametre);

            DB::commit();

            return $typeparametre;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la création du type paramètre : '
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

            $typeparametre = TypeParametre::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $typeparametre->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $typeparametre->update([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $typeparametre,
                $ancienneValeur,
                $typeparametre->toArray()
            );

            DB::commit();

            return $typeparametre;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la modification du type paramètre : '
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

            $typeparametre = TypeParametre::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($typeparametre->supprimer == 1) {

                throw new Exception(
                    'Ce type paramètre est déjà en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $typeparametre
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille du type paramètre : '
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

            $typeparametres = TypeParametre::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($typeparametres->isEmpty()) {

                throw new Exception(
                    'Aucun type paramètre à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($typeparametres as $typeparametre) {

                CorbeilleService::mettreEnCorbeille(
                    $typeparametre
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

        $items = TypeParametre::whereIn('id', $ids)
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

        $items = TypeParametre::where('supprimer', 0)->get();

        if ($items->isEmpty()) {
            throw new Exception('Aucun type de paramètre à supprimer.');
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
