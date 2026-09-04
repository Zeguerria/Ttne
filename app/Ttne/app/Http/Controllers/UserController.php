<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Parametre;
use App\Models\Profil;
use App\Models\User;
use App\Services\Core\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
            /*
            |--------------------------------------------------------------------------
            | UTILISATEUR CONNECTÉ
            |--------------------------------------------------------------------------
            */

            $user = Auth::user();

            if (!$user) {
                abort(403, 'Accès non autorisé.');
            }


            /*
            |--------------------------------------------------------------------------
            | PROFIL DE L'UTILISATEUR CONNECTÉ
            |--------------------------------------------------------------------------
            */

            $profilConnecte = $user->profil;

            if (!$profilConnecte) {
                abort(403, 'Aucun profil associé à cet utilisateur.');
            }


            /*
            |--------------------------------------------------------------------------
            | PROFILS AUTORISÉS À ÊTRE CRÉÉS / ATTRIBUÉS
            |--------------------------------------------------------------------------
            */

            $profilsAutorises = match ($profilConnecte->code) {

            /*
            |--------------------------------------------------------------------------
            | ADMIN
            |--------------------------------------------------------------------------
            */

            'ADMIN' => [
                'OPERATEUR',
                'JURISTE',
                'RH',
            ],


            /*
            |--------------------------------------------------------------------------
            | RH
            |--------------------------------------------------------------------------
            */

            'RH' => [
                'OPERATEUR',
                'JURISTE',
                'RH',
                'DEVELOPPEUR',
            ],


            /*
            |--------------------------------------------------------------------------
            | DRH
            |--------------------------------------------------------------------------
            */

            'DRH' => [
                'RH',
                'OPERATEUR',
                'JURISTE',
                'DEVELOPPEUR',
            ],


            /*
            |--------------------------------------------------------------------------
            | DIRECTEUR GÉNÉRAL
            |--------------------------------------------------------------------------
            */

            'DIRECTEUR-GENERAL' => [
                'OPERATEUR',
                'JURISTE',
                'RH',
                'DRH',
                'ADMIN',
                'DEVELOPPEUR',
                'SUPER-DEVELOPPEUR',
            ],


            /*
            |--------------------------------------------------------------------------
            | SUPER DÉVELOPPEUR
            |--------------------------------------------------------------------------
            |
            | Autorité technique maximale sur la plateforme.
            | Peut gérer tous les profils, y compris le DG.
            |
            */

            'SUPER-DEVELOPPEUR' => [
                'MEMBRE-COMMUNAUTE',
                'OPERATEUR',
                'JURISTE',
                'RH',
                'DRH',
                'DIRECTEUR-GENERAL',
                'ADMIN',
                'DEVELOPPEUR',
                'SUPER-DEVELOPPEUR',
                // 'SIMPLE-UTILISATEUR',
            ],


            /*
            |--------------------------------------------------------------------------
            | AUTRES PROFILS
            |--------------------------------------------------------------------------
            */

            default => [],
        };


            /*
            |--------------------------------------------------------------------------
            | PROFILS DISPONIBLES DANS LA VUE
            |--------------------------------------------------------------------------
            */

            $profils = Profil::where('supprimer', 0)
                ->whereIn('code', $profilsAutorises)
                ->orderBy('libelle')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            $historiques = Historique::where(
                'record_type',
                User::class
            )
            ->latest()
            ->paginate(
                5,
                ['*'],
                'history_page'
            );


            /*
            |--------------------------------------------------------------------------
            | AJAX
            |--------------------------------------------------------------------------
            */

            if ($request->ajax()) {

                return response()->json([
                    'historiques' => view(
                        'dependances.templates.admins.gestions.access.users.personnels._consoms.historique',
                        compact('historiques')
                    )->render(),

                    'current_page' => $historiques->currentPage(),
                    'last_page' => $historiques->lastPage(),
                    'has_more_pages' => $historiques->hasMorePages()
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | VUE
            |--------------------------------------------------------------------------
            */

            return view(
                'dependances.templates.admins.gestions.access.users.personnels.user',
                [
                    'UserT' => User::where(
                        'supprimer',
                        0
                    )->count(),

                    'UserTC' => User::where(
                        'supprimer',
                        1
                    )->count(),

                    'users' => User::where(
                        'supprimer',
                        0
                    )
                    ->orderBy('name')
                    ->get(),

                    'profils' => $profils,

                    'typesPieces' => Parametre::where(
                        'supprimer',
                        0
                    )
                    ->where(
                        'type_parametre_id',
                        '3'
                    )
                    ->orderBy('libelle')
                    ->get(),

                    'historiques' => $historiques,

                    'profilConnecte' => $profilConnecte,
                ]
            );
    }
    public function indexmembre(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | UTILISATEUR CONNECTÉ
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();

        if (!$user) {
            abort(403, 'Accès non autorisé.');
        }


        /*
        |--------------------------------------------------------------------------
        | PROFIL DE L'UTILISATEUR CONNECTÉ
        |--------------------------------------------------------------------------
        */

        $profilConnecte = $user->profil;

        if (!$profilConnecte) {
            abort(403, 'Aucun profil associé à cet utilisateur.');
        }


        /*
        |--------------------------------------------------------------------------
        | PROFIL MEMBRE
        |--------------------------------------------------------------------------
        */

        $profilMembre = Profil::where('supprimer', 0)
            ->where('code', 'MEMBRE-COMMUNAUTE')
            ->first();

        if (!$profilMembre) {
            abort(500, 'Le profil MEMBRE-COMMUNAUTE est introuvable.');
        }


        /*
        |--------------------------------------------------------------------------
        | PROFILS AUTORISÉS À ÊTRE CRÉÉS / ATTRIBUÉS
        |--------------------------------------------------------------------------
        |
        | Pour les membres :
        | tous les profils peuvent ajouter un membre,
        | sauf USER et MEMBRE-COMMUNAUTE.
        |
        | Cette règle sera renforcée plus tard avec
        | profil_habilitation.
        |
        */

        $peutAjouterMembre = !in_array(
            $profilConnecte->code,
            [
                'USER',
                'MEMBRE-COMMUNAUTE',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | PROFIL DISPONIBLE DANS LA VUE
        |--------------------------------------------------------------------------
        |
        | Uniquement le profil MEMBRE-COMMUNAUTE.
        |
        */

        $profils = collect([
            $profilMembre
        ]);


        /*
        |--------------------------------------------------------------------------
        | HISTORIQUE
        |--------------------------------------------------------------------------
        */

        $historiques = Historique::where(
            'record_type',
            User::class
        )
            ->latest()
            ->paginate(
                5,
                ['*'],
                'history_page'
            );


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        if ($request->ajax()) {

            return response()->json([
                'historiques' => view(
                    'dependances.templates.admins.gestions.access.users.membres._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages()
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view(
            'dependances.templates.admins.gestions.access.users.membres.user',
            [

                /*
                |--------------------------------------------------------------------------
                | NOMBRE TOTAL DE MEMBRES ACTIFS
                |--------------------------------------------------------------------------
                */

                'UserT' => User::where(
                    'supprimer',
                    0
                )
                    ->where(
                        'profil_id',
                        $profilMembre->id
                    )
                    ->count(),


                /*
                |--------------------------------------------------------------------------
                | NOMBRE TOTAL DE MEMBRES SUPPRIMÉS
                |--------------------------------------------------------------------------
                */

                'UserTC' => User::where(
                    'supprimer',
                    1
                )
                    ->where(
                        'profil_id',
                        $profilMembre->id
                    )
                    ->count(),


                /*
                |--------------------------------------------------------------------------
                | LISTE DES MEMBRES ACTIFS
                |--------------------------------------------------------------------------
                */

                'users' => User::where(
                    'supprimer',
                    0
                )
                    ->where(
                        'profil_id',
                        $profilMembre->id
                    )
                    ->orderBy('name')
                    ->get(),


                /*
                |--------------------------------------------------------------------------
                | PROFIL MEMBRE
                |--------------------------------------------------------------------------
                */

                'profils' => $profils,


                /*
                |--------------------------------------------------------------------------
                | TYPES DE PIÈCES
                |--------------------------------------------------------------------------
                */

                'typesPieces' => Parametre::where(
                    'supprimer',
                    0
                )
                    ->where(
                        'type_parametre_id',
                        3
                    )
                    ->orderBy('libelle')
                    ->get(),


                /*
                |--------------------------------------------------------------------------
                | HISTORIQUE
                |--------------------------------------------------------------------------
                */

                'historiques' => $historiques,


                /*
                |--------------------------------------------------------------------------
                | PROFIL CONNECTÉ
                |--------------------------------------------------------------------------
                */

                'profilConnecte' => $profilConnecte,


                /*
                |--------------------------------------------------------------------------
                | PROFIL MEMBRE
                |--------------------------------------------------------------------------
                */

                'profilMembre' => $profilMembre,


                /*
                |--------------------------------------------------------------------------
                | AUTORISATION D'AJOUT
                |--------------------------------------------------------------------------
                */

                'peutAjouterMembre' => $peutAjouterMembre,

            ]
        );
    }

        public function indexdemande(Request $request)
        {
            /*
            |--------------------------------------------------------------------------
            | UTILISATEUR CONNECTÉ
            |--------------------------------------------------------------------------
            */

            $user = Auth::user();

            if (!$user) {
                abort(403, 'Accès non autorisé.');
            }


            /*
            |--------------------------------------------------------------------------
            | PROFIL DE L'UTILISATEUR CONNECTÉ
            |--------------------------------------------------------------------------
            */

            $profilConnecte = $user->profil;

                if (!$profilConnecte) {
                    abort(403, 'Aucun profil associé à cet utilisateur.');
                }


            /*
            |--------------------------------------------------------------------------
            | PROFIL SIMPLE UTILISATEUR
            |--------------------------------------------------------------------------
            */

            $profilSimpleUtilisateur = Profil::where('supprimer', 0)
                ->where('code', 'SIMPLE-UTILISATEUR')
                ->first();

            if (!$profilSimpleUtilisateur) {
                abort(
                    500,
                    'Le profil SIMPLE-UTILISATEUR est introuvable.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | STATUT EN ATTENTE
            |--------------------------------------------------------------------------
            */

            $statutAttente = Parametre::where('supprimer', 0)
                ->where('code', 'S-U-ATTENTE')
                ->first();

            if (!$statutAttente) {
                abort(
                    500,
                    'Le statut S-U-ATTENTE est introuvable.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | DEMANDES ACTIVES
            |--------------------------------------------------------------------------
            |
            | Une demande correspond à :
            |
            | - profil = SIMPLE-UTILISATEUR
            | - statut = ATTENTE
            | - supprimer = 0
            |
            */

            $demandes = User::where('supprimer', 0)
                ->where('profil_id', $profilSimpleUtilisateur->id)
                ->where('statut_compte_id', $statutAttente->id)
                ->orderBy('created_at', 'desc')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | NOMBRE TOTAL DE DEMANDES
            |--------------------------------------------------------------------------
            */

            $UserT = User::where('supprimer', 0)
                ->where('profil_id', $profilSimpleUtilisateur->id)
                ->where('statut_compte_id', $statutAttente->id)
                ->count();


            /*
            |--------------------------------------------------------------------------
            | NOMBRE TOTAL DE DEMANDES SUPPRIMÉES
            |--------------------------------------------------------------------------
            */

            $UserTC = User::where('supprimer', 1)
                ->where('profil_id', $profilSimpleUtilisateur->id)
                ->where('statut_compte_id', $statutAttente->id)
                ->count();


            /*
            |--------------------------------------------------------------------------
            | TYPES DE PIÈCES
            |--------------------------------------------------------------------------
            */

            $typesPieces = Parametre::where('supprimer', 0)
                ->where('type_parametre_id', 3)
                ->orderBy('libelle')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | HISTORIQUE
            |--------------------------------------------------------------------------
            */

            $historiques = Historique::where(
                'record_type',
                User::class
            )
                ->latest()
                ->paginate(
                    5,
                    ['*'],
                    'history_page'
                );


            /*
            |--------------------------------------------------------------------------
            | AJAX
            |--------------------------------------------------------------------------
            */

            if ($request->ajax()) {

                return response()->json([

                    'historiques' => view(
                        'dependances.templates.admins.gestions.access.users.demandes._consoms.historique',
                        compact('historiques')
                    )->render(),

                    'current_page' => $historiques->currentPage(),

                    'last_page' => $historiques->lastPage(),

                    'has_more_pages' => $historiques->hasMorePages(),

                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | VUE
            |--------------------------------------------------------------------------
            */

            return view(
                'dependances.templates.admins.gestions.access.users.demandes.user',
                [

                    /*
                    |--------------------------------------------------------------------------
                    | TOTAL DEMANDES
                    |--------------------------------------------------------------------------
                    */

                    'UserT' => $UserT,


                    /*
                    |--------------------------------------------------------------------------
                    | DEMANDES SUPPRIMÉES
                    |--------------------------------------------------------------------------
                    */

                    'UserTC' => $UserTC,


                    /*
                    |--------------------------------------------------------------------------
                    | LISTE DES DEMANDES
                    |--------------------------------------------------------------------------
                    */

                    'users' => $demandes,


                    /*
                    |--------------------------------------------------------------------------
                    | PROFILS
                    |--------------------------------------------------------------------------
                    */

                    'profils' => collect([
                        $profilSimpleUtilisateur
                    ]),


                    /*
                    |--------------------------------------------------------------------------
                    | TYPES DE PIÈCES
                    |--------------------------------------------------------------------------
                    */

                    'typesPieces' => $typesPieces,


                    /*
                    |--------------------------------------------------------------------------
                    | HISTORIQUE
                    |--------------------------------------------------------------------------
                    */

                    'historiques' => $historiques,


                    /*
                    |--------------------------------------------------------------------------
                    | PROFIL CONNECTÉ
                    |--------------------------------------------------------------------------
                    */

                    'profilConnecte' => $profilConnecte,


                    /*
                    |--------------------------------------------------------------------------
                    | PROFIL SIMPLE UTILISATEUR
                    |--------------------------------------------------------------------------
                    */

                    'profilSimpleUtilisateur' => $profilSimpleUtilisateur,


                    /*
                    |--------------------------------------------------------------------------
                    | STATUT EN ATTENTE
                    |--------------------------------------------------------------------------
                    */

                    'statutAttente' => $statutAttente,

                ]
            );
        }



        //
        /*

/*
|--------------------------------------------------------------------------
| STORE UTILISATEUR
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    $data = $request->validate([

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS PERSONNELLES
        |--------------------------------------------------------------------------
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
            'unique:users,telephone',
        ],

        'email' => [
            'required',
            'email',
            'max:255',
            'unique:users,email',
        ],

        'date_naissance' => [
            'nullable',
            'date',
        ],


        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
        */

        'profil_id' => [
            'required',
            'integer',
            'exists:profils,id',
        ],


        /*
        |--------------------------------------------------------------------------
        | AUTHENTIFICATION
        |--------------------------------------------------------------------------
        */

        'password' => [
            'required',
            'confirmed',
            'min:8',
        ],


        /*
        |--------------------------------------------------------------------------
        | PHOTO UTILISATEUR
        |--------------------------------------------------------------------------
        */

        'photo' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,jfif,webp',
            'max:2048',
        ],


        /*
        |--------------------------------------------------------------------------
        | PIÈCE D'IDENTITÉ
        |--------------------------------------------------------------------------
        */

        'type_piece_id' => [
            'required',
            'integer',
            'exists:parametres,id',
        ],

        'numero' => [
            'required',
            'string',
            'max:255',
        ],

        'date_expiration' => [
            'nullable',
            'date',
        ],

        'fichier' => [
            'required',
            'file',
            'mimes:pdf,jpg,jpeg,png,webp',
            'max:5120',
        ],

    ]);


    /*
    |--------------------------------------------------------------------------
    | CRÉATION
    |--------------------------------------------------------------------------
    */

    try {

        UserService::store($data);

        toast(
            'Utilisateur créé avec succès.',
            'success'
        );

    } catch (Exception $e) {

        toast(
            $e->getMessage(),
            'error'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | RETOUR
    |--------------------------------------------------------------------------
    */

    return back();
}



    public function storemembre(Request $request)
    {
        $data = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PERSONNELLES
            |--------------------------------------------------------------------------
            */

            'name' => 'required|string|max:255',

            'prenom' => 'required|string|max:255',

            'telephone' => [
                'required',
                'string',
                'max:30',
                'unique:users,telephone',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'date_naissance' => [
                'nullable',
                'date',
            ],


            /*
            |--------------------------------------------------------------------------
            | AUTHENTIFICATION
            |--------------------------------------------------------------------------
            */

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],


            /*
            |--------------------------------------------------------------------------
            | PHOTO UTILISATEUR
            |--------------------------------------------------------------------------
            */

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,jfif,webp',
                'max:2048',
            ],


            /*
            |--------------------------------------------------------------------------
            | PIÈCE D'IDENTITÉ
            |--------------------------------------------------------------------------
            */

            'type_piece_id' => [
                'required',
                'exists:parametres,id',
            ],

            'numero' => [
                'required',
                'string',
                'max:255',
            ],

            'date_expiration' => [
                'nullable',
                'date',
            ],

            'fichier' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png,webp',
                'max:5120',
            ],

        ]);


        try {

            UserService::storemembre($data);

            toast(
                'Membre créé avec succès',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDER UNE DEMANDE
    |--------------------------------------------------------------------------
    */

    public function validerdemande(Request $request)
    {

        $data = $request->validate([

            /*

            |--------------------------------------------------------------------------
            | IDENTIFIANT DE L'UTILISATEUR
            |--------------------------------------------------------------------------
            */

            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

        ]);


        try {

            UserService::valider($data);

            toast(
                'La demande a été acceptée avec succès.',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }


        return back();
    }
    public function refuserdemande(Request $request)
    {
        $data = $request->validate([
            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
        ]);

        try {

            UserService::rejeter($data);

            toast(
                'La demande a été refusée avec succès.',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | IDENTIFICATION
            |--------------------------------------------------------------------------
            */

            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PERSONNELLES
            |--------------------------------------------------------------------------
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
                'unique:users,telephone,' . $request->id,
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $request->id,
            ],

            'date_naissance' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | PROFIL
            |--------------------------------------------------------------------------
            */

            'profil_id' => [
                'required',
                'integer',
                'exists:profils,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | AUTHENTIFICATION
            |--------------------------------------------------------------------------
            */

            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],

            /*
            |--------------------------------------------------------------------------
            | PHOTO UTILISATEUR
            |--------------------------------------------------------------------------
            */

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,jfif,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | PIÈCE D'IDENTITÉ
            |--------------------------------------------------------------------------
            */

            'type_piece_id' => [
                'nullable',
                'integer',
                'exists:parametres,id',
            ],

            'numero' => [
                'nullable',
                'string',
                'max:255',
            ],

            'date_expiration' => [
                'nullable',
                'date',
            ],

            'commentaire' => [
                'nullable',
                'string',
            ],

            'fichier' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | MODIFICATION
        |--------------------------------------------------------------------------
        */

        try {

            UserService::update($data);

            toast(
                'Utilisateur modifié avec succès.',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | RETOUR
        |--------------------------------------------------------------------------
        */

        return back();
    }


    public function updatemembre(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | IDENTIFICATION
            |--------------------------------------------------------------------------
            */

            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PERSONNELLES
            |--------------------------------------------------------------------------
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
                'unique:users,telephone,' . $request->id,
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $request->id,
            ],

            'date_naissance' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | AUTHENTIFICATION
            |--------------------------------------------------------------------------
            */

            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],

            /*
            |--------------------------------------------------------------------------
            | PHOTO UTILISATEUR
            |--------------------------------------------------------------------------
            */

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,jfif,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | PIÈCE D'IDENTITÉ
            |--------------------------------------------------------------------------
            */

            'type_piece_id' => [
                'nullable',
                'integer',
                'exists:parametres,id',
            ],

            'numero' => [
                'nullable',
                'string',
                'max:255',
            ],

            'date_expiration' => [
                'nullable',
                'date',
            ],

            'commentaire' => [
                'nullable',
                'string',
            ],

            'fichier' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | MODIFICATION
        |--------------------------------------------------------------------------
        */

        try {

            UserService::updatemembre($data);

            toast(
                'Membre modifié avec succès.',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | RETOUR
        |--------------------------------------------------------------------------
        */

        return back();
    }


    public function storedemande(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    $data = $request->validate([

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS PERSONNELLES
        |--------------------------------------------------------------------------
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

        'date_naissance' => [
            'nullable',
            'date',
        ],

        /*
        |--------------------------------------------------------------------------
        | CONTACT
        |--------------------------------------------------------------------------
        */

        'telephone' => [
            'required',
            'string',
            'max:30',
            'unique:users,telephone',
        ],

        'email' => [
            'required',
            'email',
            'max:255',
            'unique:users,email',
        ],

        /*
        |--------------------------------------------------------------------------
        | PIÈCE D'IDENTITÉ
        |--------------------------------------------------------------------------
        */

        'type_piece_id' => [
            'required',
            'integer',
            'exists:parametres,id',
        ],

        'numero' => [
            'required',
            'string',
            'max:255',
        ],

        'date_expiration' => [
            'nullable',
            'date',
        ],

        'fichier' => [
            'required',
            'file',
            'mimes:pdf,jpg,jpeg,png,webp',
            'max:5120',
        ],

        /*
        |--------------------------------------------------------------------------
        | AUTHENTIFICATION
        |--------------------------------------------------------------------------
        */

        'password' => [
            'required',
            'confirmed',
            'min:8',
        ],

        /*
        |--------------------------------------------------------------------------
        | PHOTO
        |--------------------------------------------------------------------------
        */

        'photo' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,jfif,webp',
            'max:2048',
        ],
    ]);


    /*
    |--------------------------------------------------------------------------
    | CRÉATION
    |--------------------------------------------------------------------------
    */

    try {

        UserService::storedemande($data);

        toast(
            'Demande créée avec succès.',
            'success'
        );

    } catch (Exception $e) {

        toast(
            $e->getMessage(),
            'error'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | RETOUR
    |--------------------------------------------------------------------------
    */

    return back();
}

    public function updatedemande(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | IDENTIFICATION
            |--------------------------------------------------------------------------
            */

            'id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PERSONNELLES
            |--------------------------------------------------------------------------
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
                'unique:users,telephone,' . $request->id,
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $request->id,
            ],

            'date_naissance' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | AUTHENTIFICATION
            |--------------------------------------------------------------------------
            */

            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],

            /*
            |--------------------------------------------------------------------------
            | PHOTO UTILISATEUR
            |--------------------------------------------------------------------------
            */

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,jfif,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | PIÈCE D'IDENTITÉ
            |--------------------------------------------------------------------------
            */

            'type_piece_id' => [
                'nullable',
                'integer',
                'exists:parametres,id',
            ],

            'numero' => [
                'nullable',
                'string',
                'max:255',
            ],

            'date_expiration' => [
                'nullable',
                'date',
            ],

            'commentaire' => [
                'nullable',
                'string',
            ],

            'fichier' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | MODIFICATION
        |--------------------------------------------------------------------------
        */

        try {

            UserService::updatedemande($data);

            toast(
                'Demande modifiée avec succès.',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }


        return back();
    }






}
