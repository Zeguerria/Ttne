<?php

namespace App\Services\Core;

use App\Models\Historique;
use App\Models\RoleGroupe;
use App\Services\Core\CorbeilleService;
use App\Services\Core\HistoriqueService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleGroupeService
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
            | SLUG AUTOMATIQUE
            |--------------------------------------------------------------------------
            */

            $slugBase = Str::slug($data['nom']);
            $slug = $slugBase;
            $compteur = 1;

            while (RoleGroupe::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $compteur;
                $compteur++;
            }

            /*
            |--------------------------------------------------------------------------
            | CREATION
            |--------------------------------------------------------------------------
            */

            $roleGroupe = RoleGroupe::create([

                'nom' => $data['nom'],

                'code' => $data['code'],

                'slug' => $slug,

                'description' => $data['description'] ?? null,

                'supprimer' => $data['supprimer'] ?? 0,

                'active' => $data['active'] ?? 1,

            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::creer($roleGroupe);

            DB::commit();

            return $roleGroupe;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la création du rôle groupe : '
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

            $roleGroupe = RoleGroupe::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $roleGroupe->toArray();

            /*
            |--------------------------------------------------------------------------
            | SLUG AUTOMATIQUE
            |--------------------------------------------------------------------------
            |
            | Le slug est régénéré uniquement si le nom
            | du rôle groupe a été modifié.
            |
            */

            $slug = $roleGroupe->slug;

            if ($roleGroupe->nom !== $data['nom']) {

                $slugBase = Str::slug($data['nom']);

                $slug = $slugBase;

                $compteur = 1;

                while (
                    RoleGroupe::where('slug', $slug)
                        ->where('id', '!=', $roleGroupe->id)
                        ->exists()
                ) {
                    $slug = $slugBase . '-' . $compteur;
                    $compteur++;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            $roleGroupe->update([

                'nom' => $data['nom'],

                'code' => $data['code'],

                'slug' => $slug,

                'description' => $data['description'] ?? null,

                'supprimer' => $data['supprimer'] ?? $roleGroupe->supprimer,

                'active' => $data['active'] ?? $roleGroupe->active,

            ]);

            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $roleGroupe,
                $ancienneValeur,
                $roleGroupe->toArray()
            );

            DB::commit();

            return $roleGroupe;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la modification du rôle groupe : '
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

            $roleGroupe = RoleGroupe::findOrFail(
                $data['id']
            );

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($roleGroupe->supprimer == 1) {

                throw new Exception(
                    'Ce rôle groupe est déjà supprimé.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $roleGroupe
            );

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression du rôle groupe : '
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

            $roleGroupes = RoleGroupe::where(
                'supprimer',
                0
            )->get();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($roleGroupes->isEmpty()) {

                throw new Exception(
                    'Aucun rôle groupe à supprimer.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | BOUCLE
            |--------------------------------------------------------------------------
            */

            foreach ($roleGroupes as $roleGroupe) {

                CorbeilleService::mettreEnCorbeille(
                    $roleGroupe
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

            $items = RoleGroupe::whereIn(
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
                    'Aucun rôle groupe valide à supprimer.'
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

            $items = RoleGroupe::where(
                'supprimer',
                0
            )->get();

            if ($items->isEmpty()) {

                throw new Exception(
                    'Aucun rôle groupe à supprimer.'
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
                'Erreur de la suppression globale : '
                . $e->getMessage()
            );
        }
    }
}
