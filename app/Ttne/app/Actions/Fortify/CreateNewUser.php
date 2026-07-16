<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Piece;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    public function create(array $input): User
    {
        // dd($input);

        Validator::make($input, [

            // USER

            'name' => [
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


            'date_naissance' => [
                'nullable',
                'date'
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
                    'file',
                    'mimes:jpg,jpeg,png,pdf,jfif',
                    'max:5120'
                ],



            // PHOTO PROFIL

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,,jfif',
                'max:2048'
            ],



            // PASSWORD

            'password' => $this->passwordRules(),

            'password_confirmation' => [
                'required'
            ],



            // CONDITIONS

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
                $input['prenom'].' '.$input['name']
            );


            $baseSlug = $slug;
            $i = 1;


            while(User::where('slug',$slug)->exists()){

                $slug = $baseSlug.'-'.$i;

                $i++;

            }



            /*
            |--------------------------------------------------------------------------
            | Photo utilisateur
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


                'name' => $input['name'],


                'prenom' => $input['prenom'],


                'slug' => $slug,


                // Profil SIMPLE USER
                'profil_id' => 1,


                // Compte en attente
                'statut_compte_id' => 2,


                'telephone' => $input['telephone'],


                'email' => $input['email'],


                'password' => Hash::make(
                    $input['password']
                ),


                'date_naissance' =>
                    $input['date_naissance'] ?? null,


                // Notre gestion perso
                'photo' => $photo,


                // Jetstream
                'profile_photo_path' => null,


                'derniere_ip' => request()->ip(),


                'supprimer' => false,


            ]);




            /*
            |--------------------------------------------------------------------------
            | Upload pièce
            |--------------------------------------------------------------------------
            */

            $fichier = $input['fichier']
                ->store(
                    'dependances/documents/pieces',
                    'public'
                );




            /*
            |--------------------------------------------------------------------------
            | Création pièce utilisateur
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


                'date_expiration' =>
                    null,


                'commentaire' =>
                    null,


            ]);



            return $user;


        });


    }
}
