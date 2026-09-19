<?php

namespace App\Services\Core;

use Exception;
use App\Models\Periodicite;
use Illuminate\Support\Facades\DB;

class PeriodiciteService
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

            $periodicite = Periodicite::create([
                'nom' => $data['nom'],
                'code' => $data['code'],
                'unite' => $data['unite'],
                'valeur' => $data['valeur'],
                'description' => $data['description'] ?? null,
                'active' => $data['active'] ?? true,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($periodicite);

            DB::commit();

            return $periodicite;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la création de la périodicité : '
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

            $periodicite = Periodicite::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $periodicite->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $periodicite->update([
                'nom' => $data['nom'],
                'code' => $data['code'],
                'unite' => $data['unite'],
                'valeur' => $data['valeur'],
                'description' => $data['description'] ?? null,
                'active' => $data['active'] ?? true,
            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $periodicite,
                $ancienneValeur,
                $periodicite->toArray()
            );

            DB::commit();

            return $periodicite;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la modification de la périodicité : '
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

            $periodicite = Periodicite::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($periodicite->supprimer == 1) {

                throw new Exception(
                    'Cette périodicité est déjà en supprimée.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $periodicite
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression de la périodicité : '
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

            $periodicites = Periodicite::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($periodicites->isEmpty()) {

                throw new Exception(
                    'Aucune périodicité à supprimer.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($periodicites as $periodicite) {

                CorbeilleService::mettreEnCorbeille(
                    $periodicite
                );
            }

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression massive : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE PLUSIEURS ELEMENTS EN CORBEILLE
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

            $items = Periodicite::whereIn('id', $ids)
                ->where('supprimer', 0)
                ->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucune périodicité valide à supprimer.'
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

                CorbeilleService::mettreEnCorbeille(
                    $item
                );

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression de la sélection : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE TOUT EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreEnCorbeilleAll()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES ELEMENTS ACTIFS
            |--------------------------------------------------------------------------
            */

            $items = Periodicite::where(
                'supprimer',
                0
            )->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucune périodicité à supprimer.'
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

                $ancienneValeur = $item->getOriginal();

                // Mise à jour soft logique métier
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
                        "Échec mise de la suppression de ID: "
                        . $item->id
                    );
                }
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur de la suppression globale : "
                . $e->getMessage()
            );
        }
    }
}
