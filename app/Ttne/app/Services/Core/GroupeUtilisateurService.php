<?php

namespace App\Services;

use App\Models\Groupe;
use App\Models\Parametre;
use App\Services\Core\HistoriqueService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupeUtilisateurService
{
    /**
     * |--------------------------------------------------------------------------
     * | CREATION D'UN GROUPE PAR UN UTILISATEUR
     * |--------------------------------------------------------------------------
     */
    public static function store(array $data)
    {
        DB::beginTransaction();

        try {

            /**
             * |--------------------------------------------------------------------------
             * | UTILISATEUR CONNECTÉ
             * |--------------------------------------------------------------------------
             */

            $createurId = Auth::id();

            if (!$createurId) {

                throw new Exception(
                    'Vous devez être connecté pour créer un groupe.'
                );
            }


            /**
             * |--------------------------------------------------------------------------
             * | SLUG AUTOMATIQUE
             * |--------------------------------------------------------------------------
             */

            $slugBase = Str::slug($data['nom']);

            $slug = $slugBase;

            $compteur = 1;

            while (
                Groupe::where('slug', $slug)->exists()
            ) {

                $slug = $slugBase . '-' . $compteur;

                $compteur++;
            }


            /**
             * |--------------------------------------------------------------------------
             * | STATUT INITIAL
             * |--------------------------------------------------------------------------
             *
             * Un groupe créé par un utilisateur commence
             * automatiquement en BROUILLON.
             *
             * Code :
             * S-G-BROUILLON
             */

            $statutBrouillon = Parametre::where(
                'code',
                'S-G-BROUILLON'
            )
                ->where('supprimer', 0)
                ->where('is_active', 1)
                ->first();

            if (!$statutBrouillon) {

                throw new Exception(
                    'Le statut S-G-BROUILLON est introuvable.'
                );
            }


            /**
             * |--------------------------------------------------------------------------
             * | CREATION
             * |--------------------------------------------------------------------------
             */

            $groupe = Groupe::create([

                'nom' => $data['nom'],

                'slug' => $slug,

                'description' =>
                    $data['description'] ?? null,

                /**
                 * Créateur automatique
                 */
                'createur_id' => $createurId,

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

                /**
                 * Statut automatique
                 */
                'statut_id' =>
                    $statutBrouillon->id,

            ]);


            /**
             * |--------------------------------------------------------------------------
             * | HISTORIQUE
             * |--------------------------------------------------------------------------
             */

            HistoriqueService::creer($groupe);


            /**
             * |--------------------------------------------------------------------------
             * | VALIDATION TRANSACTION
             * |--------------------------------------------------------------------------
             */

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


    /**
     * |--------------------------------------------------------------------------
     * | MODIFICATION D'UN GROUPE PAR SON CRÉATEUR
     * |--------------------------------------------------------------------------
     */
    public static function update(array $data)
    {
        DB::beginTransaction();

        try {

            /**
             * |--------------------------------------------------------------------------
             * | UTILISATEUR CONNECTÉ
             * |--------------------------------------------------------------------------
             */

            $createurId = Auth::id();

            if (!$createurId) {

                throw new Exception(
                    'Vous devez être connecté pour modifier un groupe.'
                );
            }


            /**
             * |--------------------------------------------------------------------------
             * | RECUPERATION DU GROUPE
             * |--------------------------------------------------------------------------
             */

            $groupe = Groupe::findOrFail(
                $data['id']
            );


            /**
             * |--------------------------------------------------------------------------
             * | VERIFICATION DU CREATEUR
             * |--------------------------------------------------------------------------
             *
             * Un utilisateur ne peut modifier que
             * les groupes qu'il a créés.
             */

            if ($groupe->createur_id !== $createurId) {

                throw new Exception(
                    'Vous n\'êtes pas autorisé à modifier ce groupe.'
                );
            }


            /**
             * |--------------------------------------------------------------------------
             * | ANCIENNES VALEURS
             * |--------------------------------------------------------------------------
             */

            $ancienneValeur = $groupe->toArray();


            /**
             * |--------------------------------------------------------------------------
             * | SLUG AUTOMATIQUE
             * |--------------------------------------------------------------------------
             *
             * Le slug reste identique si le nom ne change pas.
             */

            $slug = $groupe->slug;

            if ($groupe->nom !== $data['nom']) {

                $slugBase = Str::slug($data['nom']);

                $slug = $slugBase;

                $compteur = 1;

                while (
                    Groupe::where('slug', $slug)
                        ->where('id', '!=', $groupe->id)
                        ->exists()
                ) {

                    $slug = $slugBase . '-' . $compteur;

                    $compteur++;
                }
            }


            /**
             * |--------------------------------------------------------------------------
             * | MODIFICATION
             * |--------------------------------------------------------------------------
             *
             * createur_id n'est PAS modifié.
             *
             * statut_id n'est PAS envoyé par l'utilisateur.
             * Le statut actuel du groupe est conservé.
             */

            $groupe->update([

                'nom' =>
                    $data['nom'],

                'slug' =>
                    $slug,

                'description' =>
                    $data['description'] ?? null,

                /**
                 * Le créateur reste celui qui a créé
                 * le groupe.
                 */
                'createur_id' =>
                    $groupe->createur_id,

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

                /**
                 * Le statut actuel est conservé.
                 */
                'statut_id' =>
                    $groupe->statut_id,

            ]);


            /**
             * |--------------------------------------------------------------------------
             * | HISTORIQUE
             * |--------------------------------------------------------------------------
             */

            HistoriqueService::modifier(
                $groupe,
                $ancienneValeur,
                $groupe->toArray()
            );


            /**
             * |--------------------------------------------------------------------------
             * | VALIDATION TRANSACTION
             * |--------------------------------------------------------------------------
             */

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
}

