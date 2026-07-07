<?php

namespace App\Services\Core;

use Exception;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class ProfilService
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

            $profil = Profil::create([
                'code' => $data['code'],
                'libelle' => $data['libelle'],
                'description' => $data['description'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($profil);

            DB::commit();

            return $profil;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors de la création du profil: "
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

            $profil = Profil::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $profil->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $profil->update([
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
                $profil,
                $ancienneValeur,
                $profil->toArray()
            );

            DB::commit();

            return $profil;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
            "Erreur lors de la modification du profil : "
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

            $profil = Profil::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($profil->supprimer == 1) {

                throw new Exception(
                    'Ce profil est déjà en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $profil
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors de la mise en corbeille du profil : "
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

            $profils = Profil::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($profils->isEmpty()) {

                throw new Exception(
                    'Aucun profil à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($profils as $profil) {

                CorbeilleService::mettreEnCorbeille(
                    $profil
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

            $items = Profil::whereIn('id', $ids)
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

            $items = Profil::where('supprimer', 0)->get();

            if ($items->isEmpty()) {
                throw new Exception('Aucun profil à supprimer.');
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
