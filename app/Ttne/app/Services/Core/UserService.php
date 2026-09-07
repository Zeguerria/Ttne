<?php

namespace App\Services\Core;

use App\Models\Parametre;
use App\Models\Piece;
use App\Models\Profil;
use App\Models\User;
use App\Services\Core\FichierService;
use App\Services\Core\HistoriqueService;
use Exception;
use Illuminate\Support\Facades\Auth;
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
    public static function storedemande(array $data)
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
                ->where('code', 'SIMPLE-UTILISATEUR')
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

                'statut_compte_id' => 2,

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
                "Erreur lors de la création de la demande : " . $e->getMessage()
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
    public static function updatedemande(array $data)
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
                ->where('code', 'SIMPLE-UTILISATEUR')
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
                    "La demande n'a pas lieu d'etre"
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
                "Erreur lors de la modification de la demande : "
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
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL SIMPLE UTILISATEUR
            |--------------------------------------------------------------------------
            |
            | L'utilisateur doit actuellement être un SIMPLE-UTILISATEUR
            | avant de pouvoir être accepté.
            |
            */

            $profilSimpleUtilisateur = Profil::where('supprimer', 0)
                ->where('code', 'SIMPLE-UTILISATEUR')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            |
            | Après validation, l'utilisateur devient automatiquement
            | MEMBRE-COMMUNAUTE.
            |
            */

            $profilMembre = Profil::where('supprimer', 0)
                ->where('code', 'MEMBRE-COMMUNAUTE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | STATUT EN ATTENTE
            |--------------------------------------------------------------------------
            */

            $statutAttente = Parametre::where('supprimer', 0)
                ->where('code', 'S-U-ATTENTE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | STATUT ACCEPTE
            |--------------------------------------------------------------------------
            */

            $statutAccepte = Parametre::where('supprimer', 0)
                ->where('code', 'S-U-ACCEPTE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DE L'UTILISATEUR
            |--------------------------------------------------------------------------
            */

            $user = User::findOrFail(
                $data['id']
            );


            /*
            |--------------------------------------------------------------------------
            | VERIFICATION DU PROFIL
            |--------------------------------------------------------------------------
            |
            | Seul un SIMPLE-UTILISATEUR peut être accepté.
            |
            */

            if ($user->profil_id !== $profilSimpleUtilisateur->id) {

                throw new Exception(
                    "L'utilisateur sélectionné n'est pas un simple utilisateur."
                );
            }


            /*
            |--------------------------------------------------------------------------
            | VERIFICATION DU STATUT
            |--------------------------------------------------------------------------
            |
            | Seul un utilisateur EN ATTENTE peut être accepté.
            |
            */

            if ($user->statut_compte_id !== $statutAttente->id) {

                throw new Exception(
                    "L'utilisateur sélectionné n'est pas en attente de validation."
                );
            }


            /*
            |--------------------------------------------------------------------------
            | ANCIENNE VALEUR POUR L'HISTORIQUE
            |--------------------------------------------------------------------------
            |
            | On récupère l'état AVANT la validation.
            |
            */

            $ancienneValeur = $user->toArray();


            /*
            |--------------------------------------------------------------------------
            | VALIDATION DE L'UTILISATEUR
            |--------------------------------------------------------------------------
            |
            | SIMPLE-UTILISATEUR
            |        ↓
            | MEMBRE-COMMUNAUTE
            |
            | S-U-ATTENTE
            |        ↓
            | S-U-ACCEPTE
            |
            */

            $user->profil_id = $profilMembre->id;

            $user->statut_compte_id = $statutAccepte->id;


            /*
            |--------------------------------------------------------------------------
            | DERNIERE IP
            |--------------------------------------------------------------------------
            */

            $user->derniere_ip = request()->ip();


            /*
            |--------------------------------------------------------------------------
            | ENREGISTREMENT
            |--------------------------------------------------------------------------
            */

            $user->save();


            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            |
            | On enregistre la différence entre l'ancien état
            | et le nouvel état.
            |
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


            /*
            |--------------------------------------------------------------------------
            | RETOUR
            |--------------------------------------------------------------------------
            */

            return $user;


        } catch (Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | ANNULATION TRANSACTION
            |--------------------------------------------------------------------------
            */

            DB::rollBack();


            /*
            |--------------------------------------------------------------------------
            | ERREUR
            |--------------------------------------------------------------------------
            */

            throw new Exception(
                "Erreur lors de la validation de l'utilisateur : "
                . $e->getMessage()
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | REJETER UN UTILISATEUR
    |--------------------------------------------------------------------------
    */

    public static function rejeter(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RÉCUPÉRATION DES PROFILS
            |--------------------------------------------------------------------------
            */

            $profilSimpleUtilisateur = Profil::where('supprimer', 0)
                ->where('code', 'SIMPLE-UTILISATEUR')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | RÉCUPÉRATION DES STATUTS
            |--------------------------------------------------------------------------
            */

            $statutAttente = Parametre::where('supprimer', 0)
                ->where('code', 'S-U-ATTENTE')
                ->firstOrFail();

            $statutRefuse = Parametre::where('supprimer', 0)
                ->where('code', 'S-U-REFUSE')
                ->firstOrFail();


            /*
            |--------------------------------------------------------------------------
            | RÉCUPÉRATION DE L'UTILISATEUR
            |--------------------------------------------------------------------------
            */

            $user = User::findOrFail($data['id']);


            /*
            |--------------------------------------------------------------------------
            | VÉRIFICATION DU PROFIL
            |--------------------------------------------------------------------------
            */

            if ($user->profil_id !== $profilSimpleUtilisateur->id) {
                throw new Exception(
                    "L'utilisateur sélectionné n'est pas un simple utilisateur."
                );
            }


            /*
            |--------------------------------------------------------------------------
            | VÉRIFICATION DU STATUT
            |--------------------------------------------------------------------------
            */

            if ($user->statut_compte_id !== $statutAttente->id) {
                throw new Exception(
                    "L'utilisateur sélectionné n'est pas en attente de validation."
                );
            }


            /*
            |--------------------------------------------------------------------------
            | ANCIENNES VALEURS POUR L'HISTORIQUE
            |--------------------------------------------------------------------------
            */

            $ancienneValeur = $user->toArray();


            /*
            |--------------------------------------------------------------------------
            | REFUS DE LA DEMANDE
            |--------------------------------------------------------------------------
            |
            | On conserve :
            | - le profil SIMPLE-UTILISATEUR
            | - l'utilisateur en base
            |
            | On modifie :
            | - le statut → S-U-REFUSE
            | - la date du refus
            | - la dernière IP
            |
            */

            $user->statut_compte_id = $statutRefuse->id;
            $user->date_refus = now();
            $user->derniere_ip = request()->ip();

            $user->save();


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

            return $user;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors du rejet de l'utilisateur : "
                . $e->getMessage()
            );
        }
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

        /*
    |--------------------------------------------------------------------------
    | METTRE EN CORBEILLE - PERSONNEL
    |--------------------------------------------------------------------------
    */

        /**
     * |--------------------------------------------------------------------------
     * | METTRE UN PERSONNEL EN CORBEILLE
     * |--------------------------------------------------------------------------
     */
    public static function mettreEnCorbeille(array $data)
    {
        DB::beginTransaction();

        try {

            /**
             * |--------------------------------------------------------------------------
             * | RECUPERATION DU PERSONNEL
             * |--------------------------------------------------------------------------
             */
            $user = User::findOrFail($data['id']);

            /**
             * |--------------------------------------------------------------------------
             * | EMPECHER L'AUTO-SUPPRESSION
             * |--------------------------------------------------------------------------
             */
            if ($user->id === Auth::id()) {
                throw new Exception(
                    'Vous ne pouvez pas mettre votre propre compte en corbeille.'
                );
            }

            /**
             * |--------------------------------------------------------------------------
             * | VERIFICATION
             * |--------------------------------------------------------------------------
             */
            if ($user->supprimer == 1) {
                throw new Exception(
                    'Cet utilisateur est supprimé .'
                );
            }

            /**
             * |--------------------------------------------------------------------------
             * | MISE EN CORBEILLE
             * |--------------------------------------------------------------------------
             */
            CorbeilleService::mettreEnCorbeille($user);

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                "Erreur lors de la suppression de l'utilisateur : "
                . $e->getMessage()
            );
        }
    }


    /**
     * |--------------------------------------------------------------------------
     * | METTRE UNE SELECTION DE PERSONNELS EN CORBEILLE
     * |--------------------------------------------------------------------------
     */
    public static function mettreSelectionEnCorbeille(array $ids)
    {
        DB::beginTransaction();

        try {

            /**
             * |--------------------------------------------------------------------------
             * | IDENTIFIANT DE L'UTILISATEUR CONNECTE
             * |--------------------------------------------------------------------------
             */
            $currentUserId = Auth::id();

            /**
             * |--------------------------------------------------------------------------
             * | EMPECHER L'AUTO-SUPPRESSION DANS LA SELECTION
             * |--------------------------------------------------------------------------
             */
            if (in_array($currentUserId, $ids)) {
                throw new Exception(
                    'Vous ne pouvez pas mettre votre propre compte en corbeille.'
                );
            }

            /**
             * |--------------------------------------------------------------------------
             * | RECUPERATION DES PERSONNELS ACTIFS
             * |--------------------------------------------------------------------------
             */
            $users = User::whereIn('id', $ids)
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucun personnel valide à mettre en corbeille.'
                );
            }

            /**
             * |--------------------------------------------------------------------------
             * | COMPTEUR
             * |--------------------------------------------------------------------------
             */
            $count = 0;

            /**
             * |--------------------------------------------------------------------------
             * | MISE EN CORBEILLE
             * |--------------------------------------------------------------------------
             */
            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la sélection : '
                . $e->getMessage()
            );
        }
    }


    /**
     * |--------------------------------------------------------------------------
     * | METTRE TOUT LE PERSONNEL EN CORBEILLE
     * |--------------------------------------------------------------------------
     */
    public static function mettreEnCorbeilleAll()
    {
        DB::beginTransaction();

        try {

            /**
             * |--------------------------------------------------------------------------
             * | IDENTIFIANT DE L'UTILISATEUR CONNECTE
             * |--------------------------------------------------------------------------
             */
            $currentUserId = Auth::id();

            /**
             * |--------------------------------------------------------------------------
             * | RECUPERATION DES PERSONNELS ACTIFS
             * | EXCLUSION DU COMPTE CONNECTE
             * |--------------------------------------------------------------------------
             */
            $users = User::where('supprimer', 0)
                ->where('id', '!=', $currentUserId)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucun personnel à supprimer .'
                );
            }

            /**
             * |--------------------------------------------------------------------------
             * | COMPTEUR
             * |--------------------------------------------------------------------------
             */
            $count = 0;

            /**
             * |--------------------------------------------------------------------------
             * | MISE EN CORBEILLE
             * |--------------------------------------------------------------------------
             */
            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la suppression de tous les personnels : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE DEMANDE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleDemande(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DE LA DEMANDE
            |--------------------------------------------------------------------------
            */

            $user = User::where('id', $data['id'])
                ->where('supprimer', 0)
                ->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | VERIFICATION DU PROFIL
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            if ($user->profil_id != $profilDemande->id) {
                throw new Exception(
                    'Cet utilisateur ne correspond pas à une demande.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | MISE EN CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille($user);

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la demande : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE SELECTION DE DEMANDES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreSelectionCorbeilleDemande(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL DEMANDE
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES DEMANDES
            |--------------------------------------------------------------------------
            */

            $users = User::whereIn('id', $ids)
                ->where('profil_id', $profilDemande->id)
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucune demande valide à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la sélection des demandes : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE TOUTES LES DEMANDES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleDemandeAll()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL DEMANDE
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES DEMANDES
            |--------------------------------------------------------------------------
            */

            $users = User::where(
                    'profil_id',
                    $profilDemande->id
                )
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucune demande à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de toutes les demandes : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UN MEMBRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleMembre(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DU MEMBRE
            |--------------------------------------------------------------------------
            */

            $user = User::where('id', $data['id'])
                ->where('supprimer', 0)
                ->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            */

            $profilMembre = Profil::where(
                'code',
                'MEMBRE-COMMUNAUTE'
            )->firstOrFail();

            if ($user->profil_id != $profilMembre->id) {
                throw new Exception(
                    'Cet utilisateur ne correspond pas à un membre.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | MISE EN CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille($user);

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille du membre : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE SELECTION DE MEMBRES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreSelectionCorbeilleMembre(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            */

            $profilMembre = Profil::where(
                'code',
                'MEMBRE-COMMUNAUTE'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES MEMBRES
            |--------------------------------------------------------------------------
            */

            $users = User::whereIn('id', $ids)
                ->where('profil_id', $profilMembre->id)
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucun membre valide à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la sélection des membres : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE TOUS LES MEMBRES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleMembreAll()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL MEMBRE
            |--------------------------------------------------------------------------
            */

            $profilMembre = Profil::where(
                'code',
                'MEMBRE-COMMUNAUTE'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES MEMBRES
            |--------------------------------------------------------------------------
            */

            $users = User::where(
                    'profil_id',
                    $profilMembre->id
                )
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucun membre à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de tous les membres : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE DEMANDE REJETEE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleDemandeRejetee(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DE LA DEMANDE
            |--------------------------------------------------------------------------
            */

            $user = User::where('id', $data['id'])
                ->where('supprimer', 0)
                ->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | PROFIL DEMANDE
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            if ($user->profil_id != $profilDemande->id) {
                throw new Exception(
                    'Cet utilisateur ne correspond pas à une demande.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | STATUT REFUSE
            |--------------------------------------------------------------------------
            */

            $statutRefuse = Parametre::where(
                'code',
                'S-U-REFUSE'
            )->firstOrFail();

            if ($user->statut_compte_id != $statutRefuse->id) {
                throw new Exception(
                    'Cette demande n\'est pas rejetée.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | MISE EN CORBEILLE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::mettreEnCorbeille($user);

            DB::commit();

            return true;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la demande rejetée : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE SELECTION DE DEMANDES REJETEES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function mettreSelectionCorbeilleDemandeRejetee(array $ids)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL DEMANDE
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | STATUT REFUSE
            |--------------------------------------------------------------------------
            */

            $statutRefuse = Parametre::where(
                'code',
                'S-U-REFUSE'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES DEMANDES REJETEES
            |--------------------------------------------------------------------------
            */

            $users = User::whereIn('id', $ids)
                ->where('profil_id', $profilDemande->id)
                ->where(
                    'statut_compte_id',
                    $statutRefuse->id
                )
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucune demande rejetée valide à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de la sélection des demandes rejetées : '
                . $e->getMessage()
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE TOUTES LES DEMANDES REJETEES EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public static function mettreCorbeilleDemandeRejeteeAll()
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | PROFIL DEMANDE
            |--------------------------------------------------------------------------
            */

            $profilDemande = Profil::where(
                'code',
                'SIMPLE-UTILISATEUR'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | STATUT REFUSE
            |--------------------------------------------------------------------------
            */

            $statutRefuse = Parametre::where(
                'code',
                'S-U-REFUSE'
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | RECUPERATION DES DEMANDES REJETEES
            |--------------------------------------------------------------------------
            */

            $users = User::where(
                    'profil_id',
                    $profilDemande->id
                )
                ->where(
                    'statut_compte_id',
                    $statutRefuse->id
                )
                ->where('supprimer', 0)
                ->get();

            if ($users->isEmpty()) {
                throw new Exception(
                    'Aucune demande rejetée à mettre en corbeille.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | COMPTEUR
            |--------------------------------------------------------------------------
            */

            $count = 0;

            foreach ($users as $user) {

                CorbeilleService::mettreEnCorbeille($user);

                $count++;
            }

            DB::commit();

            return $count;

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception(
                'Erreur lors de la mise en corbeille de toutes les demandes rejetées : '
                . $e->getMessage()
            );
        }
    }


}
