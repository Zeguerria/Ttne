<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Piece;
use App\Notifications\NouvelleInscriptionNotification;
use App\Services\Core\FichierService;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input): User
    {
        /**
         * =========================================================
         * VALIDATION
         * =========================================================
         */

        Validator::make($input, [

            /**
             * -----------------------------------------------------
             * USER
             * -----------------------------------------------------
             */

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'prenom' => [
                'required',
                'string',
                'max:255',
            ],

            'telephone' => [
                'required',
                'string',
                'max:30',
                'unique:users',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],

            'date_naissance' => [
                'nullable',
                'date',
            ],

            /**
             * -----------------------------------------------------
             * PIECE D'IDENTITE
             * -----------------------------------------------------
             */

            'type_piece_id' => [
                'required',
                'exists:parametres,id',
            ],

            'numero' => [
                'nullable',
                'string',
                'max:255',
            ],

            'fichier' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:5120',
            ],

            /**
             * -----------------------------------------------------
             * PHOTO
             * -----------------------------------------------------
             */

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            /**
             * -----------------------------------------------------
             * PASSWORD
             * -----------------------------------------------------
             */

            'password' => $this->passwordRules(),

            'password_confirmation' => [
                'required',
                'same:password',
            ],

            /**
             * -----------------------------------------------------
             * CONDITIONS
             * -----------------------------------------------------
             */

            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
                ? ['accepted', 'required']
                : '',

        ])->validate();


        /**
         * =========================================================
         * CREATION
         * =========================================================
         */

        return DB::transaction(function () use ($input) {

            /**
             * -----------------------------------------------------
             * GENERATION SLUG
             * -----------------------------------------------------
             */

            $slug = Str::slug(
                $input['prenom'] . ' ' . $input['name']
            );

            $baseSlug = $slug;
            $i = 1;

            while (User::where('slug', $slug)->exists()) {

                $slug = $baseSlug . '-' . $i;
                $i++;
            }


            /**
             * -----------------------------------------------------
             * PHOTO PROFIL
             * -----------------------------------------------------
             */

            $photo = null;

            if (!empty($input['photo'])) {

                $photo = FichierService::stockerPhoto(
                    $input['photo'],
                    null,
                    $input['prenom'] . ' ' . $input['name']
                );
            }


            /**
             * -----------------------------------------------------
             * CREATION USER
             * -----------------------------------------------------
             */

            $user = User::create([

                'name' => $input['name'],

                'prenom' => $input['prenom'],

                'slug' => $slug,

                /**
                 * SIMPLE USER
                 */
                'profil_id' => 1,

                /**
                 * EN ATTENTE
                 */
                'statut_compte_id' => 2,

                'telephone' => $input['telephone'],

                'email' => $input['email'],

                'password' => Hash::make(
                    $input['password']
                ),

                'date_naissance' =>
                    $input['date_naissance'] ?? null,

                /**
                 * Photo gérée par FichierService
                 */
                'photo' => $photo,

                /**
                 * Jetstream conservé
                 */
                'profile_photo_path' => null,

                'derniere_ip' => request()->ip(),

                'supprimer' => false,
            ]);


            /**
             * -----------------------------------------------------
             * PIECE D'IDENTITE
             * -----------------------------------------------------
             */

            $document = FichierService::stockerDocument(
                $input['fichier'],
                null,
                $input['numero'] ?? $user->slug . '-piece'
            );


            /**
             * -----------------------------------------------------
             * CREATION PIECE
             * -----------------------------------------------------
             */

            Piece::create([

                'user_id' => $user->id,

                'type_piece_id' =>
                    $input['type_piece_id'],

                'numero' =>
                    $input['numero'] ?? null,

                'fichier' =>
                    $document['path'],

                'mime_type' =>
                    $document['mime_type'],

                'date_expiration' =>
                    null,

                'commentaire' =>
                    null,
            ]);


            /**
             * -----------------------------------------------------
             * NOTIFICATION DES VALIDATEURS
             * -----------------------------------------------------
             */

            $validateurs = User::whereHas('profil', function ($query) {

                $query->where('est_validateur', true);

            })->get();


            foreach ($validateurs as $validateur) {

                $validateur->notify(
                    new NouvelleInscriptionNotification($user)
                );
            }


            return $user;
        });
    }
}
