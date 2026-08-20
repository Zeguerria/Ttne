<?php

namespace App\Services\Core;

use Exception;
use App\Models\User;
use App\Models\Piece;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Services\Core\HistoriqueService;

class UserService
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
        | Upload photo utilisateur
        |--------------------------------------------------------------------------
        */

        $photo = null;

        if (!empty($data['photo'])) {

            $photo = $data['photo']->store(
                'dependances/photos/users',
                'public'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Génération du slug
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug(
            $data['prenom'].' '.$data['name']
        );

        $baseSlug = $slug;
        $i = 1;

        while (User::where('slug', $slug)->exists()) {

            $slug = $baseSlug.'-'.$i;

            $i++;

        }

        /*
        |--------------------------------------------------------------------------
        | Création utilisateur
        |--------------------------------------------------------------------------
        */

        $user = User::create([

            'name' => $data['name'],

            'prenom' => $data['prenom'],

            'slug' => $slug,

            'profil_id' => $data['profil_id'],

            // 'statut_compte_id' => $data['statut_compte_id'],
            'statut_compte_id' => 3,

            'telephone' => $data['telephone'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),

            'date_naissance' => $data['date_naissance'] ?? null,

            'photo' => $photo,

            'derniere_ip' => request()->ip(),

            'supprimer' => false,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Pièce d'identité
        |--------------------------------------------------------------------------
        */

        if (!empty($data['fichier'])) {

            $document = $data['fichier']->store(
                'dependances/documents/pieces',
                'public'
            );

            Piece::create([

                'user_id' => $user->id,

                'type_piece_id' => $data['type_piece_id'],

                'numero' => $data['numero'] ?? null,

                'fichier' => $document,

                'mime_type' => $data['fichier']->getMimeType(),

                'date_expiration' => $data['date_expiration'] ?? null,

                'commentaire' => null,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Historique
        |--------------------------------------------------------------------------
        */

        HistoriqueService::creer($user);

        DB::commit();

        return $user;

    } catch (Exception $e) {

        DB::rollBack();

        /*
        |--------------------------------------------------------------------------
        | Suppression des fichiers uploadés en cas d'erreur
        |--------------------------------------------------------------------------
        */

        if (!empty($photo)) {

            Storage::disk('public')->delete($photo);

        }

        if (!empty($document)) {

            Storage::disk('public')->delete($document);

        }

        throw new Exception(
            "Erreur lors de la création de l'utilisateur : ".$e->getMessage()
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

    }

    /*
    |--------------------------------------------------------------------------
    | VALIDER UN UTILISATEUR
    |--------------------------------------------------------------------------
    */

    public static function valider(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | REJETER UN UTILISATEUR
    |--------------------------------------------------------------------------
    */

    public static function rejeter(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | CHANGER LE PROFIL
    |--------------------------------------------------------------------------
    */

    public static function changerProfil(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | CHANGER LE MOT DE PASSE
    |--------------------------------------------------------------------------
    */

    public static function changerMotDePasse(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | CHANGER LA PHOTO
    |--------------------------------------------------------------------------
    */

    public static function changerPhoto(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreEnCorbeille(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | METTRE UNE SELECTION EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreSelectionEnCorbeille(array $ids)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | TOUT METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreEnCorbeilleAll()
    {

    }

    /*
    |--------------------------------------------------------------------------
    | RESTAURER
    |--------------------------------------------------------------------------
    */

    public static function restaurer(array $data)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | SUPPRESSION DEFINITIVE
    |--------------------------------------------------------------------------
    */

    public static function supprimer(array $data)
    {

    }

}
