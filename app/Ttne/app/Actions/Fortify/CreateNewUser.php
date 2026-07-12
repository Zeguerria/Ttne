<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Piece;
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


    /**
     * Create a new user
     */
    public function create(array $input): User
    {

        Validator::make($input, [

            // USER
            'nom' => [
                'required',
                'string',
                'max:255'
            ],

            'prenom' => [
                'required',
                'string',
                'max:255'
            ],

            'telephone' => [
                'required',
                'string',
                'max:30',
                'unique:users'
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],


            // PIECE

            'type_piece_id' => [
                'required',
                'exists:parametres,id'
            ],

            'numero' => [
                'nullable',
                'string',
                'max:255'
            ],

            'fichier' => [
                'required',
                'file'
            ],


            // PHOTO

            'photo' => [
                'nullable',
                'image',
                'max:2048'
            ],


            // PASSWORD

            'password' => $this->passwordRules(),


            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
                ? ['accepted','required']
                : '',


        ])->validate();



        return DB::transaction(function () use ($input) {


            /*
            |--------------------------------------------------------------------------
            | Génération du slug
            |--------------------------------------------------------------------------
            */

            $slug = Str::slug(
                $input['prenom'].' '.$input['nom']
            );


            $baseSlug = $slug;
            $i = 1;


            while(User::where('slug',$slug)->exists()){

                $slug = $baseSlug.'-'.$i;

                $i++;
            }



            /*
            |--------------------------------------------------------------------------
            | Upload photo utilisateur
            |--------------------------------------------------------------------------
            */

            $photo = null;


            if(isset($input['photo'])){

                $photo = $input['photo']
                    ->store(
                        'dependances/photos/users',
                        'public'
                    );

            }



            /*
            |--------------------------------------------------------------------------
            | Création utilisateur
            |--------------------------------------------------------------------------
            */

            $user = User::create([


                'nom' => $input['nom'],

                'prenom' => $input['prenom'],

                'slug' => $slug,


                // SIMPLE USER
                'profil_id' => 1,


                // ATTENTE
                'statut_compte_id' => 2,


                'telephone' => $input['telephone'],


                'email' => $input['email'],


                'password' => Hash::make(
                    $input['password']
                ),


                'photo' => $photo,


                'derniere_ip' => request()->ip(),


                'supprimer' => false,


            ]);





            /*
            |--------------------------------------------------------------------------
            | Upload pièce identité
            |--------------------------------------------------------------------------
            */

            $fichier = $input['fichier']
                ->store(
                    'dependances/documents/pieces',
                    'public'
                );



            /*
            |--------------------------------------------------------------------------
            | Création de la pièce
            |--------------------------------------------------------------------------
            */

            Piece::create([


                'user_id' => $user->id,


                'type_piece_id' =>
                    $input['type_piece_id'],


                'numero' =>
                    $input['numero'] ?? null,


                'fichier' =>
                    $fichier,


                'mime_type' =>
                    $input['fichier']->getMimeType(),



                // Aucune expiration pour le moment
                'date_expiration' => null,


                // ATTENTE
                'statut_piece_id' => 2,


                'commentaire' => null,


            ]);



            return $user;


        });


    }
}
