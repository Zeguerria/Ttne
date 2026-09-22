<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Historique;
use App\Models\Parametre;
use App\Models\Periodicite;
use App\Services\Core\GroupeService;
use Exception;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $historiques = Historique::where(
            'record_type',
            Groupe::class
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
                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | PARAMÈTRES DU CRUD GROUPE
        |--------------------------------------------------------------------------
        */

        $periodicites = Periodicite::where(
            'active',
            false
        )
            ->orderBy('id')
            ->get();

        $modesDistribution = Parametre::where(
            'type_parametre_id',
            4
        )
            ->orderBy('id')
            ->get();

        $validationsMembre = Parametre::where(
            'type_parametre_id',
            5
        )
            ->orderBy('id')
            ->get();

        $visibilites = Parametre::where(
            'type_parametre_id',
            6
        )
            ->orderBy('id')
            ->get();

        $statutsGroupe = Parametre::where(
            'type_parametre_id',
            7
        )
            ->orderBy('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view(
            'dependances.templates.admins.gestions.delicatesses.groupes.groupe',
            [

                /*
                |--------------------------------------------------------------------------
                | COMPTEURS
                |--------------------------------------------------------------------------
                */

                'GroupeT' => Groupe::where(
                    'supprimer',
                    0
                )->count(),

                'GroupeTC' => Groupe::where(
                    'supprimer',
                    1
                )->count(),

                /*
                |--------------------------------------------------------------------------
                | GROUPES
                |--------------------------------------------------------------------------
                */

                'groupes' => Groupe::where(
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

                /*
                |--------------------------------------------------------------------------
                | PERIODICITES
                |--------------------------------------------------------------------------
                */

                'periodicites' => $periodicites,

                /*
                |--------------------------------------------------------------------------
                | PARAMETRES GROUPE
                |--------------------------------------------------------------------------
                */

                'modesDistribution' => $modesDistribution,

                'validationsMembre' => $validationsMembre,

                'visibilites' => $visibilites,

                'statutsGroupe' => $statutsGroupe,
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

            'nom' => 'required|string|max:255',

            'slug' => 'required|string|max:255|unique:groupes,slug',

            'description' => 'nullable|string',

            'createur_id' => 'required|exists:users,id',

            'montant_cotisation' => 'required|numeric|min:0',

            'penalite_pourcentage' => 'nullable|numeric|min:0',

            'fonds_assurance_pourcentage' => 'nullable|numeric|min:0',

            'delai_grace_heures' => 'nullable|integer|min:0',

            'nombre_participants_max' => 'required|integer|min:1',

            'periodicite_id' => 'required|exists:parametres,id',

            'date_debut' => 'required|date',

            'date_fin_estimee' => 'nullable|date|after_or_equal:date_debut',

            'mode_distribution_id' => 'required|exists:parametres,id',

            'validation_membre_id' => 'required|exists:parametres,id',

            'visibilite_id' => 'required|exists:parametres,id',

            'statut_id' => 'required|exists:parametres,id',

        ]);

        try {

            GroupeService::store($data);

            toast(
                'Groupe créé avec succès',
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

            'id' => 'required|exists:groupes,id',

            'nom' => 'required|string|max:255',

            'slug' => 'required|string|max:255|unique:groupes,slug,' . $request->id,

            'description' => 'nullable|string',

            'createur_id' => 'required|exists:users,id',

            'montant_cotisation' => 'required|numeric|min:0',

            'penalite_pourcentage' => 'nullable|numeric|min:0',

            'fonds_assurance_pourcentage' => 'nullable|numeric|min:0',

            'delai_grace_heures' => 'nullable|integer|min:0',

            'nombre_participants_max' => 'required|integer|min:1',

            'periodicite_id' => 'required|exists:parametres,id',

            'date_debut' => 'required|date',

            'date_fin_estimee' => 'nullable|date|after_or_equal:date_debut',

            'mode_distribution_id' => 'required|exists:parametres,id',

            'validation_membre_id' => 'required|exists:parametres,id',

            'visibilite_id' => 'required|exists:parametres,id',

            'statut_id' => 'required|exists:parametres,id',

        ]);

        try {

            GroupeService::update($data);

            toast(
                'Groupe modifié avec succès',
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

            'id' => 'required|exists:groupes,id',

        ]);

        try {

            GroupeService::mettreEnCorbeille(
                $data
            );

            toast(
                'Groupe supprimé',
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

            'ids' => 'required|array',

            'ids.*' => 'exists:groupes,id',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = GroupeService::mettreSelectionEnCorbeille(
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

            $count = GroupeService::mettreEnCorbeilleAll();

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
