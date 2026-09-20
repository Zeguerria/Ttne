<?php

namespace App\Services\Core;

use Exception;
use App\Models\Groupe;
use Illuminate\Support\Facades\DB;

class GroupeService
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

            $groupe = Groupe::create([

                'nom' => $data['nom'],

                'slug' => $data['slug'],

                'description' => $data['description'] ?? null,

                'createur_id' => $data['createur_id'],

                'montant_cotisation' => $data['montant_cotisation'],

                'penalite_pourcentage' =>
                    $data['penalite_pourcentage'] ?? 0,

                'fonds_assurance_pourcentage' =>
                    $data['fonds_assurance_pourcentage'] ?? 0,

                'delai_grace_heures' =>
                    $data['delai_grace_heures'] ?? 0,

                'nombre_participants_max' =>
                    $data['nombre_participants_max'],

                'periodicite_id' =>
                    $data['periodicite_id'],

                'date_debut' =>
                    $data['date_debut'],

                'date_fin_estimee' =>
                    $data['date_fin_estimee'] ?? null,

                'mode_distribution_id' =>
                    $data['mode_distribution_id'],

                'validation_membre_id' =>
                    $data['validation_membre_id'],

                'visibilite_id' =>
                    $data['visibilite_id'],

                'statut_id' =>
                    $data['statut_id'],

            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($groupe);

            DB::commit();

            return $groupe;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la création du groupe : '
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

            $groupe = Groupe::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $groupe->toArray();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $groupe->update([

                'nom' => $data['nom'],

                'slug' => $data['slug'],

                'description' => $data['description'] ?? null,

                'createur_id' => $data['createur_id'],

                'montant_cotisation' =>
                    $data['montant_cotisation'],

                'penalite_pourcentage' =>
                    $data['penalite_pourcentage'] ?? 0,

                'fonds_assurance_pourcentage' =>
                    $data['fonds_assurance_pourcentage'] ?? 0,

                'delai_grace_heures' =>
                    $data['delai_grace_heures'] ?? 0,

                'nombre_participants_max' =>
                    $data['nombre_participants_max'],

                'periodicite_id' =>
                    $data['periodicite_id'],

                'date_debut' =>
                    $data['date_debut'],

                'date_fin_estimee' =>
                    $data['date_fin_estimee'] ?? null,

                'mode_distribution_id' =>
                    $data['mode_distribution_id'],

                'validation_membre_id' =>
                    $data['validation_membre_id'],

                'visibilite_id' =>
                    $data['visibilite_id'],

                'statut_id' =>
                    $data['statut_id'],

            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $groupe,
                $ancienneValeur,
                $groupe->toArray()
            );

            DB::commit();

            return $groupe;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la modification du groupe : '
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

            $groupe = Groupe::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($groupe->supprimer == 1) {

                throw new Exception(
                    'Ce groupe est déjà en supprimé.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $groupe
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression du groupe : '
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

            $groupes = Groupe::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($groupes->isEmpty()) {

                throw new Exception(
                    'Aucun groupe à supprimer.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($groupes as $groupe) {

                CorbeilleService::mettreEnCorbeille(
                    $groupe
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

            $items = Groupe::whereIn(
                'id',
                $ids
            )
                ->where(
                    'supprimer',
                    0
                )
                ->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucun groupe valide à supprimer.'
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

            $items = Groupe::where(
                'supprimer',
                0
            )->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucun groupe à supprimer.'
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

                $ancienneValeur =
                    $item->getOriginal();

                /*
                |--------------------------------------------------------------------------
                | MISE EN CORBEILLE
                |--------------------------------------------------------------------------
                */

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

