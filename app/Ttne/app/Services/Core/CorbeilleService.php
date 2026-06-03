<?php

namespace App\Services\Core;

use App\Models\Corbeille;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class CorbeilleService
{
    /*
    |--------------------------------------------------------------------------
    | METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreEnCorbeille($record)
    {
        if (!is_object($record)) {

            throw new Exception(
                'Le record fourni est invalide.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DEJA EN CORBEILLE ?
        |--------------------------------------------------------------------------
        */

        $exists = Corbeille::where(
            'table_name',
            $record->getTable()
        )
        ->where(
            'element_id',
            $record->id
        )
        ->exists();

        if ($exists) {

            throw new Exception(
                'Cet élément est déjà en corbeille.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRESSION LOGIQUE
        |--------------------------------------------------------------------------
        */

        $record->update([
            'supprimer' => 1
        ]);

        /*
        |--------------------------------------------------------------------------
        | CREATION DANS CORBEILLE
        |--------------------------------------------------------------------------
        */

        Corbeille::create([

            'element_id' => $record->id,

            'table_name' => $record->getTable(),

            'slug' => self::getDisplayName($record),

            'type' => class_basename($record),

            'deleted_by' => Auth::id(),

            'deleted_at' => now(),

            'data_snapshot' => $record->toArray(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | HISTORIQUE
        |--------------------------------------------------------------------------
        */

        HistoriqueService::miseEnCorbeille(
            $record
        );

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | RESTAURER
    |--------------------------------------------------------------------------
    */

    public static function restaurer(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION CORBEILLE
            |--------------------------------------------------------------------------
            */

            $corbeille = Corbeille::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DU MODELE D'ORIGINE
            |--------------------------------------------------------------------------
            */

            $record = $corbeille->getModelInstance();

            if (!$record) {

                throw new Exception(
                    'Impossible de restaurer cet élément.'
                );

            }

            /*
            |--------------------------------------------------------------------------
            | RESTAURATION
            |--------------------------------------------------------------------------
            */

            $record->update([

                'supprimer' => 0

            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::restauration(
                $record
            );

            /*
            |--------------------------------------------------------------------------
            | SUPPRESSION DE LA CORBEILLE
            |--------------------------------------------------------------------------
            */

            $corbeille->delete();

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la restauration : '
                . $e->getMessage()
            );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | SUPPRESSION DEFINITIVE
    |--------------------------------------------------------------------------
    */

    // public static function supprimerDefinitivement(
    //     Corbeille $corbeille
    // ) {
    //     DB::beginTransaction();

    //     try {

    //         /*
    //         |--------------------------------------------------------------------------
    //         | RECUPERATION RECORD
    //         |--------------------------------------------------------------------------
    //         */

    //         $record = $corbeille->getModelInstance();

    //         /*
    //         |--------------------------------------------------------------------------
    //         | HISTORIQUE
    //         |--------------------------------------------------------------------------
    //         */

    //         if ($record) {

    //             HistoriqueService::suppressionDefinitive(
    //                 $record
    //             );

    //             /*
    //             |--------------------------------------------------------------------------
    //             | DELETE REEL
    //             |--------------------------------------------------------------------------
    //             */

    //             $record->delete();
    //         }

    //         /*
    //         |--------------------------------------------------------------------------
    //         | DELETE CORBEILLE
    //         |--------------------------------------------------------------------------
    //         */

    //         $corbeille->delete();

    //         DB::commit();

    //         return true;

    //     } catch (Exception $e) {

    //         DB::rollBack();

    //         throw new Exception(
    //             'Erreur lors de la suppression définitive : '
    //             . $e->getMessage()
    //         );
    //     }
    // }
    public static function supprimerDefinitivement(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |------------------------------------------------------------------
            | RECUPERATION CORBEILLE
            |------------------------------------------------------------------
            */

            $corbeille = Corbeille::findOrFail(
                $data['id']
            );

            /*
            |------------------------------------------------------------------
            | RECUPERATION DE L'ENREGISTREMENT D'ORIGINE
            |------------------------------------------------------------------
            */

            $record = $corbeille->getModelInstance();

            /*
            |------------------------------------------------------------------
            | HISTORIQUE + SUPPRESSION REELLE
            |------------------------------------------------------------------
            */

            if ($record) {

                HistoriqueService::suppressionDefinitive(
                    $record
                );

                $record->delete();
            }

            /*
            |------------------------------------------------------------------
            | SUPPRESSION DE L'ENTREE CORBEILLE
            |------------------------------------------------------------------
            */

            $corbeille->delete();

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression définitive : '
                . $e->getMessage()
            );
        }
    }

public static function supprimerTout()
{
    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | RECUPERATION CORBEILLE
        |--------------------------------------------------------------------------
        */

        $corbeilles = Corbeille::all();

        if ($corbeilles->isEmpty()) {

            throw new Exception(
                'Aucun élément à supprimer.'
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
        | SUPPRESSION
        |--------------------------------------------------------------------------
        */

        foreach ($corbeilles as $corbeille) {

            $record = $corbeille->getModelInstance();

            if ($record) {

                HistoriqueService::suppressionDefinitive(
                    $record
                );

                $record->delete();
            }

            $corbeille->delete();

            $count++;
        }

        DB::commit();

        return $count;

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
    | RESTAURER TOUT
    |--------------------------------------------------------------------------
    */

    public static function restaurerTout()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION CORBEILLE
            |--------------------------------------------------------------------------
            */

            $corbeilles = Corbeille::all();

            if ($corbeilles->isEmpty()) {

                throw new Exception(
                    'Aucun élément à restaurer.'
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
            | RESTAURATION
            |--------------------------------------------------------------------------
            */

            foreach ($corbeilles as $corbeille) {

                $record = $corbeille->getModelInstance();

                if (!$record) {

                    continue;
                }

                $record->update([
                    'supprimer' => 0
                ]);

                HistoriqueService::restauration(
                    $record
                );

                $corbeille->delete();

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la restauration massive : '
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | SUPPRIMER TOUT DEFINITIVEMENT
    |--------------------------------------------------------------------------
    */

    // public static function supprimerTout()
    // {
    //     DB::beginTransaction();

    //     try {

    //         $corbeilles = Corbeille::all();

    //         if ($corbeilles->isEmpty()) {

    //             throw new Exception(
    //                 'Aucun élément à supprimer.'
    //             );
    //         }

    //         foreach ($corbeilles as $corbeille) {

    //             self::supprimerDefinitivement(
    //                 $corbeille
    //             );
    //         }

    //         DB::commit();

    //         return true;

    //     } catch (Exception $e) {

    //         DB::rollBack();

    //         throw new Exception(
    //             'Erreur lors de la suppression massive : '
    //             . $e->getMessage()
    //         );
    //     }
    // }

    /*
    |--------------------------------------------------------------------------
    | NOM D'AFFICHAGE UNIVERSEL
    |--------------------------------------------------------------------------
    */

    private static function getDisplayName($record): string
    {
        if (method_exists($record, 'getDisplayName')) {

            return $record->getDisplayName();
        }

        return class_basename($record)
            . ' #'
            . $record->id;
    }

    /*
|--------------------------------------------------------------------------
| SUPPRIMER UNE SELECTION DEFINITIVEMENT
|--------------------------------------------------------------------------
*/

    // public static function supprimerSelection(array $ids)
    // {
    //     DB::beginTransaction();

    //     try {

    //         /*
    //         |--------------------------------------------------------------------------
    //         | RECUPERATION DES ELEMENTS DE LA CORBEILLE
    //         |--------------------------------------------------------------------------
    //         */

    //         $corbeilles = Corbeille::whereIn('id', $ids)->get();

    //         if ($corbeilles->isEmpty()) {

    //             throw new Exception(
    //                 'Aucun élément valide à supprimer.'
    //             );
    //         }

    //         /*
    //         |--------------------------------------------------------------------------
    //         | COMPTEUR
    //         |--------------------------------------------------------------------------
    //         */

    //         $count = 0;

    //         /*
    //         |--------------------------------------------------------------------------
    //         | SUPPRESSION DEFINITIVE
    //         |--------------------------------------------------------------------------
    //         */

    //         foreach ($corbeilles as $corbeille) {

    //             self::supprimerDefinitivement(
    //                 $corbeille
    //             );

    //             $count++;
    //         }

    //         DB::commit();

    //         return $count;

    //     } catch (Exception $e) {

    //         DB::rollBack();

    //         throw new Exception(
    //             'Erreur lors de la suppression définitive de la sélection : '
    //             . $e->getMessage()
    //         );
    //     }
    // }
    public static function supprimerSelection(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |------------------------------------------------------------------
            | RECUPERATION DES ELEMENTS DE LA CORBEILLE
            |------------------------------------------------------------------
            */

            $corbeilles = Corbeille::whereIn(
                'id',
                $ids
            )->get();

            if ($corbeilles->isEmpty()) {

                throw new Exception(
                    'Aucun élément valide à supprimer.'
                );
            }

            /*
            |------------------------------------------------------------------
            | COMPTEUR
            |------------------------------------------------------------------
            */

            $count = 0;

            /*
            |------------------------------------------------------------------
            | SUPPRESSION DEFINITIVE
            |------------------------------------------------------------------
            */

            foreach ($corbeilles as $corbeille) {

                self::supprimerDefinitivement(
                    $corbeille
                );

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression définitive de la sélection : '
                . $e->getMessage()
            );
        }
    }
    public static function restaurerSelection(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |----------------------------------------------------------
            | RECUPERATION CORBEILLE
            |----------------------------------------------------------
            */

            $corbeilles = Corbeille::whereIn('id', $ids)->get();

            if ($corbeilles->isEmpty()) {

                throw new Exception(
                    'Aucun élément valide à restaurer.'
                );
            }

            /*
            |----------------------------------------------------------
            | COMPTEUR
            |----------------------------------------------------------
            */

            $count = 0;

            /*
            |----------------------------------------------------------
            | RESTAURATION
            |----------------------------------------------------------
            */

            foreach ($corbeilles as $corbeille) {

                /*
                |------------------------------------------------------
                | RECUPERATION MODELE ORIGINAL
                |------------------------------------------------------
                */

                $record = $corbeille->getModelInstance();

                if (!$record) {
                    continue;
                }

                /*
                |------------------------------------------------------
                | RESTAURER L'ÉLÉMENT MÉTIER
                |------------------------------------------------------
                */

                $record->update([
                    'supprimer' => 0
                ]);

                /*
                |------------------------------------------------------
                | HISTORIQUE
                |------------------------------------------------------
                */

                HistoriqueService::restauration($record);

                /*
                |------------------------------------------------------
                | SUPPRESSION CORBEILLE
                |------------------------------------------------------
                */

                $corbeille->delete();

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la restauration de la sélection : '
                . $e->getMessage()
            );
        }
    }
}
