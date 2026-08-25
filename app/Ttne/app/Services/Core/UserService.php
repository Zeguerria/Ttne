<?php

namespace App\Services\Core;

use App\Models\Piece;
use App\Models\Profil;
use App\Models\User;
use App\Services\Core\FichierService;
use App\Services\Core\HistoriqueService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                $photo = FichierService::stockerPhoto(
                    $data['photo'],
                    null,
                    $data['prenom'] . ' ' . $data['name']
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

            $document = null;

            if (!empty($data['fichier'])) {

                $documentData = FichierService::stockerDocument(
                    $data['fichier'],
                    null,
                    $data['numero'] ?? 'piece'
                );

                $document = $documentData['path'];

                Piece::create([
                    'user_id' => $user->id,
                    'type_piece_id' => $data['type_piece_id'],
                    'numero' => $data['numero'] ?? null,
                    'fichier' => $document,
                    'mime_type' => $documentData['mime_type'],
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
    public static function storemembre(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            |
            | Cette méthode crée exclusivement un membre.
            | Le profil ne doit donc jamais être fourni par le formulaire.
            |
            */

            $profilMembre = Profil::where('supprimer', 0)
                ->where('code', 'MEMBRE-COMMUNAUTE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | Upload photo utilisateur
            |--------------------------------------------------------------------------
            */

            $photo = null;

            if (!empty($data['photo'])) {

                $photo = FichierService::stockerPhoto(
                    $data['photo'],
                    null,
                    $data['prenom'] . ' ' . $data['name']
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Génération du slug
            |--------------------------------------------------------------------------
            */

            $slug = Str::slug(
                $data['prenom'] . ' ' . $data['name']
            );

            $baseSlug = $slug;
            $i = 1;

            while (User::where('slug', $slug)->exists()) {

                $slug = $baseSlug . '-' . $i;
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

                /*
                |------------------------------------------------------------------
                | PROFIL IMPOSÉ
                |------------------------------------------------------------------
                */

                'profil_id' => $profilMembre->id,

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

            $document = null;

            if (!empty($data['fichier'])) {

                $documentData = FichierService::stockerDocument(
                    $data['fichier'],
                    null,
                    $data['numero'] ?? 'piece'
                );

                $document = $documentData['path'];

                Piece::create([

                    'user_id' => $user->id,

                    'type_piece_id' => $data['type_piece_id'],

                    'numero' => $data['numero'] ?? null,

                    'fichier' => $document,

                    'mime_type' => $documentData['mime_type'],

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


            /*
            |--------------------------------------------------------------------------
            | Validation transaction
            |--------------------------------------------------------------------------
            */

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
                "Erreur lors de la création du membre : " . $e->getMessage()
            );
        }
    }
    public static function update(array $data)
    {
        DB::beginTransaction();

        $anciennePhoto = null;
        $ancienneDocument = null;

        $nouvellePhoto = null;
        $nouveauDocument = null;

        try {

            /*
            |--------------------------------------------------------------------------
            | Récupération de l'utilisateur
            |--------------------------------------------------------------------------
            */

            $user = User::findOrFail(
                $data['id']
            );


            /*
            |--------------------------------------------------------------------------
            | Ancienne valeur pour l'historique
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $user->toArray();


            /*
            |--------------------------------------------------------------------------
            | Ancienne photo
            |--------------------------------------------------------------------------
            */

            $anciennePhoto = $user->photo;


            /*
            |--------------------------------------------------------------------------
            | Pièce d'identité existante
            |--------------------------------------------------------------------------
            */

            $piece = Piece::where(
                'user_id',
                $user->id
            )->first();

            if ($piece) {
                $ancienneDocument = $piece->fichier;
            }


            /*
            |--------------------------------------------------------------------------
            | Upload photo utilisateur
            |--------------------------------------------------------------------------
            */

            if (!empty($data['photo'])) {

                $nouvellePhoto = FichierService::stockerPhoto(
                    $data['photo'],
                    null,
                    $data['prenom'] . ' ' . $data['name']
                );

                $user->photo = $nouvellePhoto;
            }


            /*
            |--------------------------------------------------------------------------
            | Génération du slug
            |--------------------------------------------------------------------------
            */

            if (
                $user->name !== $data['name'] ||
                $user->prenom !== $data['prenom']
            ) {

                $slug = Str::slug(
                    $data['prenom'] . ' ' . $data['name']
                );

                $baseSlug = $slug;
                $i = 1;

                while (
                    User::where('slug', $slug)
                        ->where('id', '!=', $user->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }

                $user->slug = $slug;
            }


            /*
            |--------------------------------------------------------------------------
            | Modification utilisateur
            |--------------------------------------------------------------------------
            */

            $user->name = $data['name'];

            $user->prenom = $data['prenom'];

            $user->profil_id = $data['profil_id'];

            $user->telephone = $data['telephone'];

            $user->email = $data['email'];

            $user->date_naissance =
                $data['date_naissance'] ?? null;


            /*
            |--------------------------------------------------------------------------
            | Mot de passe
            |--------------------------------------------------------------------------
            */

            if (!empty($data['password'])) {

                $user->password = Hash::make(
                    $data['password']
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Dernière IP
            |--------------------------------------------------------------------------
            */

            $user->derniere_ip = request()->ip();


            /*
            |--------------------------------------------------------------------------
            | Enregistrement utilisateur
            |--------------------------------------------------------------------------
            */

            $user->save();


            /*
            |--------------------------------------------------------------------------
            | Pièce d'identité
            |--------------------------------------------------------------------------
            */

            if (!empty($data['fichier'])) {

                $documentData = FichierService::stockerDocument(
                    $data['fichier'],
                    null,
                    $data['numero'] ?? 'piece'
                );

                $nouveauDocument = $documentData['path'];


                /*
                |--------------------------------------------------------------------------
                | Mise à jour de la pièce existante
                |--------------------------------------------------------------------------
                */

                if ($piece) {

                    $piece->update([

                        'type_piece_id' =>
                            $data['type_piece_id'],

                        'numero' =>
                            $data['numero'] ?? null,

                        'fichier' =>
                            $nouveauDocument,

                        'mime_type' =>
                            $documentData['mime_type'],

                        'date_expiration' =>
                            $data['date_expiration'] ?? null,

                        'commentaire' =>
                            $data['commentaire'] ?? null,
                    ]);

                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Création de la pièce si inexistante
                    |--------------------------------------------------------------------------
                    */

                    Piece::create([

                        'user_id' =>
                            $user->id,

                        'type_piece_id' =>
                            $data['type_piece_id'],

                        'numero' =>
                            $data['numero'] ?? null,

                        'fichier' =>
                            $nouveauDocument,

                        'mime_type' =>
                            $documentData['mime_type'],

                        'date_expiration' =>
                            $data['date_expiration'] ?? null,

                        'commentaire' =>
                            $data['commentaire'] ?? null,
                    ]);
                }

            } elseif ($piece) {

                /*
                |--------------------------------------------------------------------------
                | Modification des informations de la pièce
                | sans remplacement du fichier
                |--------------------------------------------------------------------------
                */

                $piece->update([

                    'type_piece_id' =>
                        $data['type_piece_id'] ??
                        $piece->type_piece_id,

                    'numero' =>
                        $data['numero'] ??
                        $piece->numero,

                    'date_expiration' =>
                        $data['date_expiration'] ??
                        $piece->date_expiration,

                    'commentaire' =>
                        $data['commentaire'] ??
                        $piece->commentaire,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Historique
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $user,
                $ancienneValeur,
                $user->toArray()
            );


            /*
            |--------------------------------------------------------------------------
            | Validation transaction
            |--------------------------------------------------------------------------
            */

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | Suppression ancienne photo
            |--------------------------------------------------------------------------
            */

            if (
                !empty($nouvellePhoto) &&
                !empty($anciennePhoto) &&
                $anciennePhoto !== $nouvellePhoto
            ) {

                Storage::disk('public')->delete(
                    $anciennePhoto
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Suppression ancien document
            |--------------------------------------------------------------------------
            */

            if (
                !empty($nouveauDocument) &&
                !empty($ancienneDocument) &&
                $ancienneDocument !== $nouveauDocument
            ) {

                Storage::disk('public')->delete(
                    $ancienneDocument
                );
            }


            return $user;

        } catch (Exception $e) {

            DB::rollBack();


            /*
            |--------------------------------------------------------------------------
            | Suppression nouvelle photo en cas d'erreur
            |--------------------------------------------------------------------------
            */

            if (!empty($nouvellePhoto)) {

                Storage::disk('public')->delete(
                    $nouvellePhoto
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Suppression nouveau document en cas d'erreur
            |--------------------------------------------------------------------------
            */

            if (!empty($nouveauDocument)) {

                Storage::disk('public')->delete(
                    $nouveauDocument
                );
            }


            throw new Exception(
                "Erreur lors de la modification de l'utilisateur : "
                . $e->getMessage()
            );
        }
    }
    public static function updatemembre(array $data)
    {
        DB::beginTransaction();

        $anciennePhoto = null;
        $ancienneDocument = null;

        $nouvellePhoto = null;
        $nouveauDocument = null;

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            |
            | Cette méthode modifie exclusivement un membre.
            | Le profil reste donc toujours MEMBRE-COMMUNAUTE.
            |
            */

            $profilMembre = Profil::where('supprimer', 0)
                ->where('code', 'MEMBRE-COMMUNAUTE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | Récupération du membre
            |--------------------------------------------------------------------------
            */

            $user = User::findOrFail(
                $data['id']
            );


            /*
            |--------------------------------------------------------------------------
            | Vérification du profil
            |--------------------------------------------------------------------------
            |
            | On s'assure que l'utilisateur concerné est bien un membre.
            |
            */

            if ($user->profil_id !== $profilMembre->id) {
                throw new Exception(
                    "L'utilisateur sélectionné n'est pas un membre."
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Ancienne valeur pour l'historique
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $user->toArray();


            /*
            |--------------------------------------------------------------------------
            | Ancienne photo
            |--------------------------------------------------------------------------
            */

            $anciennePhoto = $user->photo;


            /*
            |--------------------------------------------------------------------------
            | Pièce d'identité existante
            |--------------------------------------------------------------------------
            */

            $piece = Piece::where(
                'user_id',
                $user->id
            )->first();

            if ($piece) {
                $ancienneDocument = $piece->fichier;
            }


            /*
            |--------------------------------------------------------------------------
            | Upload photo utilisateur
            |--------------------------------------------------------------------------
            */

            if (!empty($data['photo'])) {

                $nouvellePhoto = FichierService::stockerPhoto(
                    $data['photo'],
                    null,
                    $data['prenom'] . ' ' . $data['name']
                );

                $user->photo = $nouvellePhoto;
            }


            /*
            |--------------------------------------------------------------------------
            | Génération du slug
            |--------------------------------------------------------------------------
            */

            if (
                $user->name !== $data['name'] ||
                $user->prenom !== $data['prenom']
            ) {

                $slug = Str::slug(
                    $data['prenom'] . ' ' . $data['name']
                );

                $baseSlug = $slug;
                $i = 1;

                while (
                    User::where('slug', $slug)
                        ->where('id', '!=', $user->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }

                $user->slug = $slug;
            }


            /*
            |--------------------------------------------------------------------------
            | Modification utilisateur
            |--------------------------------------------------------------------------
            */

            $user->name = $data['name'];

            $user->prenom = $data['prenom'];

            /*
            | Profil volontairement imposé
            */
            $user->profil_id = $profilMembre->id;

            /*
            | Le statut du compte n'est pas modifié ici
            */
            $user->telephone = $data['telephone'];

            $user->email = $data['email'];

            $user->date_naissance =
                $data['date_naissance'] ?? null;


            /*
            |--------------------------------------------------------------------------
            | Mot de passe
            |--------------------------------------------------------------------------
            */

            if (!empty($data['password'])) {

                $user->password = Hash::make(
                    $data['password']
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Dernière IP
            |--------------------------------------------------------------------------
            */

            $user->derniere_ip = request()->ip();


            /*
            |--------------------------------------------------------------------------
            | Enregistrement utilisateur
            |--------------------------------------------------------------------------
            */

            $user->save();


            /*
            |--------------------------------------------------------------------------
            | Pièce d'identité
            |--------------------------------------------------------------------------
            */

            if (!empty($data['fichier'])) {

                $documentData = FichierService::stockerDocument(
                    $data['fichier'],
                    null,
                    $data['numero'] ?? 'piece'
                );

                $nouveauDocument = $documentData['path'];


                /*
                |--------------------------------------------------------------------------
                | Mise à jour de la pièce existante
                |--------------------------------------------------------------------------
                */

                if ($piece) {

                    $piece->update([

                        'type_piece_id' =>
                            $data['type_piece_id'],

                        'numero' =>
                            $data['numero'] ?? null,

                        'fichier' =>
                            $nouveauDocument,

                        'mime_type' =>
                            $documentData['mime_type'],

                        'date_expiration' =>
                            $data['date_expiration'] ?? null,

                        'commentaire' =>
                            $data['commentaire'] ?? null,
                    ]);

                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Création de la pièce si inexistante
                    |--------------------------------------------------------------------------
                    */

                    Piece::create([

                        'user_id' =>
                            $user->id,

                        'type_piece_id' =>
                            $data['type_piece_id'],

                        'numero' =>
                            $data['numero'] ?? null,

                        'fichier' =>
                            $nouveauDocument,

                        'mime_type' =>
                            $documentData['mime_type'],

                        'date_expiration' =>
                            $data['date_expiration'] ?? null,

                        'commentaire' =>
                            $data['commentaire'] ?? null,
                    ]);
                }

            } elseif ($piece) {

                /*
                |--------------------------------------------------------------------------
                | Mise à jour des informations de la pièce
                | sans remplacement du fichier
                |--------------------------------------------------------------------------
                */

                $piece->update([

                    'type_piece_id' =>
                        $data['type_piece_id'] ??
                        $piece->type_piece_id,

                    'numero' =>
                        $data['numero'] ??
                        $piece->numero,

                    'date_expiration' =>
                        $data['date_expiration'] ??
                        $piece->date_expiration,

                    'commentaire' =>
                        $data['commentaire'] ??
                        $piece->commentaire,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Historique
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $user,
                $ancienneValeur,
                $user->toArray()
            );


            /*
            |--------------------------------------------------------------------------
            | Validation transaction
            |--------------------------------------------------------------------------
            */

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | Suppression ancienne photo
            |--------------------------------------------------------------------------
            */

            if (
                !empty($nouvellePhoto) &&
                !empty($anciennePhoto) &&
                $anciennePhoto !== $nouvellePhoto
            ) {
                Storage::disk('public')->delete(
                    $anciennePhoto
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Suppression ancien document
            |--------------------------------------------------------------------------
            */

            if (
                !empty($nouveauDocument) &&
                !empty($ancienneDocument) &&
                $ancienneDocument !== $nouveauDocument
            ) {
                Storage::disk('public')->delete(
                    $ancienneDocument
                );
            }


            return $user;

        } catch (Exception $e) {

            DB::rollBack();


            /*
            |--------------------------------------------------------------------------
            | Suppression nouvelle photo en cas d'erreur
            |--------------------------------------------------------------------------
            */

            if (!empty($nouvellePhoto)) {
                Storage::disk('public')->delete(
                    $nouvellePhoto
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Suppression nouveau document en cas d'erreur
            |--------------------------------------------------------------------------
            */

            if (!empty($nouveauDocument)) {
                Storage::disk('public')->delete(
                    $nouveauDocument
                );
            }


            throw new Exception(
                "Erreur lors de la modification du membre : "
                . $e->getMessage()
            );
        }
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
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION
            |--------------------------------------------------------------------------
            */

            $user = User::findOrFail(
                $data['id']
            );


            /*
            |--------------------------------------------------------------------------
            | VERIFICATION
            |--------------------------------------------------------------------------
            */

            if ($user->supprimer == 1) {

                throw new Exception(
                    'Cet utilisateur est déjà en corbeille.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | ANCIENNE VALEUR
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $user->toArray();


            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille(
                $user
            );


            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            HistoriqueService::modifier(
                $user,
                $ancienneValeur,
                $user->toArray()
            );


            /*
            |--------------------------------------------------------------------------
            | VALIDATION TRANSACTION
            |--------------------------------------------------------------------------
            */

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de l\'utilisateur : '
                . $e->getMessage()
            );
        }
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
