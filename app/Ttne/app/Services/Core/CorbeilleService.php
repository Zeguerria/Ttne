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

    public static function restaurer(Corbeille $corbeille)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION RECORD
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
            | DELETE CORBEILLE
            |--------------------------------------------------------------------------
            */

            $corbeille->delete();

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

    public static function supprimerDefinitivement(
        Corbeille $corbeille
    ) {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION RECORD
            |--------------------------------------------------------------------------
            */

            $record = $corbeille->getModelInstance();

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            if ($record) {

                HistoriqueService::suppressionDefinitive(
                    $record
                );

                /*
                |--------------------------------------------------------------------------
                | DELETE REEL
                |--------------------------------------------------------------------------
                */

                $record->delete();
            }

            /*
            |--------------------------------------------------------------------------
            | DELETE CORBEILLE
            |--------------------------------------------------------------------------
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

    /*
    |--------------------------------------------------------------------------
    | RESTAURER TOUT
    |--------------------------------------------------------------------------
    */

    public static function restaurerTout()
    {
        DB::beginTransaction();

        try {

            $corbeilles = Corbeille::all();

            if ($corbeilles->isEmpty()) {

                throw new Exception(
                    'Aucun élément à restaurer.'
                );
            }

            foreach ($corbeilles as $corbeille) {

                self::restaurer(
                    $corbeille
                );
            }

            DB::commit();

            return true;

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

    public static function supprimerTout()
    {
        DB::beginTransaction();

        try {

            $corbeilles = Corbeille::all();

            if ($corbeilles->isEmpty()) {

                throw new Exception(
                    'Aucun élément à supprimer.'
                );
            }

            foreach ($corbeilles as $corbeille) {

                self::supprimerDefinitivement(
                    $corbeille
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
}
