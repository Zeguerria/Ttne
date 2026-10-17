<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\RoleGroupe;
use App\Services\Core\RoleGroupeService;
use Exception;
use Illuminate\Http\Request;

class RoleGroupeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | HISTORIQUES
        |--------------------------------------------------------------------------
        */

        $historiques = Historique::where(
            'record_type',
            RoleGroupe::class
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
                    'dependances.templates.admins.gestions.delicatesses.roles._consoms.historique',
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
            'dependances.templates.admins.gestions.delicatesses.roles.role',
            [

                /*
                |--------------------------------------------------------------------------
                | COMPTEURS
                |--------------------------------------------------------------------------
                */

                'RoleGroupeT' => RoleGroupe::where(
                    'supprimer',
                    0
                )->count(),

                'RoleGroupeTC' => RoleGroupe::where(
                    'supprimer',
                    1
                )->count(),

                /*
                |--------------------------------------------------------------------------
                | ROLE GROUPES
                |--------------------------------------------------------------------------
                */

                'roleGroupes' => RoleGroupe::where(
                    'supprimer',
                    0
                )
                    ->orderBy('nom')
                    ->get(),

                /*
                |--------------------------------------------------------------------------
                | HISTORIQUES
                |--------------------------------------------------------------------------
                */

                'historiques' => $historiques,

            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATION
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $data = $request->validate([

            'nom' =>
                'required|string|max:255',

            'code' =>
                'required|string|max:255|unique:role_groupes,code',

            'description' =>
                'nullable|string',

            'supprimer' =>
                'nullable|boolean',

            'active' =>
                'nullable|boolean',

        ]);

        try {

            RoleGroupeService::store($data);

            toast(
                'Rôle groupe créé avec succès',
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
    | MODIFICATION
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $data = $request->validate([

            'id' =>
                'required|exists:role_groupes,id',

            'nom' =>
                'required|string|max:255',

            'code' =>
                'required|string|max:255|unique:role_groupes,code,' .
                $request->id,

            'description' =>
                'nullable|string',

            'supprimer' =>
                'nullable|boolean',

            'active' =>
                'nullable|boolean',

        ]);

        try {

            RoleGroupeService::update($data);

            toast(
                'Rôle groupe modifié avec succès',
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
    | METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeille(Request $request)
    {
        $data = $request->validate([

            'id' =>
                'required|exists:role_groupes,id',

        ]);

        try {

            RoleGroupeService::mettreEnCorbeille(
                $data
            );

            toast(
                'Rôle groupe supprimé',
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
    | METTRE UNE SELECTION EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeilleSelection(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            'ids' =>
                'required|array',

            'ids.*' =>
                'exists:role_groupes,id',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = RoleGroupeService::mettreSelectionEnCorbeille(
                $data['ids']
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) mis en corbeille avec succès',
                'success'
            );

        } catch (Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | ERREUR
            |--------------------------------------------------------------------------
            */

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | TOUT METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeilleAll(Request $request)
    {
        try {

            $count = RoleGroupeService::mettreEnCorbeilleAll();

            toast(
                $count . ' élément(s) supprimé(s)',
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
