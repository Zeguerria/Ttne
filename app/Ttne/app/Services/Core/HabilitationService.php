<?php

namespace App\Services\Core;

use Exception;
use App\Models\Habilitation;
use Illuminate\Support\Facades\DB;

class HabilitationService
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

            $habilitation = Habilitation::create([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($habilitation);

            DB::commit();

            return $habilitation;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors de la création de  l'habilitation: "
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

            $habilitation = Habilitation::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $habilitation->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $habilitation->update([
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
                $habilitation,
                $ancienneValeur,
                $habilitation->toArray()
            );

            DB::commit();

            return $habilitation;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
            "Erreur lors de la modification de l'habilitation : "
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

            $habilitation = Habilitation::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($habilitation->supprimer == 1) {

                throw new Exception(
                    'Cette habilitation est déjà en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $habilitation
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors de la mise en corbeille de l'habilitation : "
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

            $habilitations = Habilitation::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($habilitations->isEmpty()) {

                throw new Exception(
                    'Aucune habilitation à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($habilitations as $habilitation) {

                CorbeilleService::mettreEnCorbeille(
                    $habilitation
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

        $items = Habilitation::whereIn('id', $ids)
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

        $items = Habilitation::where('supprimer', 0)->get();

        if ($items->isEmpty()) {
            throw new Exception('Aucune habilitation à supprimer.');
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
