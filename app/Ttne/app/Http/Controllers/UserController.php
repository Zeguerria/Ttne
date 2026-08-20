<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Models\Parametre;
use App\Models\Profil;
use App\Models\User;
use App\Services\Core\UserService;
use Exception;


class UserController extends Controller
{
     public function index(Request $request)
    {
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
        =========================================================
        AJAX
        =========================================================
        */

        if($request->ajax()){

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
                'profils' => Profil::where(
                    'supprimer',
                    0
                )
                ->orderBy('libelle')
                ->get(),
                'typesPieces' => Parametre::where('supprimer', 0)->where('type_parametre_id','3')->orderBy('libelle')->get(),

                'historiques' => $historiques

            ]
        );
    }
        //
        /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
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
        | PROFIL
        |--------------------------------------------------------------------------
        */

        'profil_id' => [
            'required',
            'exists:profils,id',
        ],


        /*
        |--------------------------------------------------------------------------
        | STATUT
        |--------------------------------------------------------------------------
        */

        'statut_compte_id' => [
            'nullable',
            'exists:parametres,id',
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

        UserService::store($data);

        toast(
            'Utilisateur créé avec succès',
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
