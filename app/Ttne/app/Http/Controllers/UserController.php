<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Models\Parametre;
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
                ->orderBy('libelle')
                ->get(),

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

            // Informations personnelles
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:30|unique:users,telephone',
            'email' => 'required|email|max:255|unique:users,email',
            'date_naissance' => 'nullable|date',
            // Profil
            'profil_id' => 'required|exists:profils,id',
            // Statut
            'statut_compte_id' => 'required|exists:parametres,id',
            // Authentification
            'password' => 'required|confirmed|min:8',
            // Photo
            'photo' => 'nullable|image|mimes:jpg,jpeg,pdf,png,jfif|max:2048',
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
