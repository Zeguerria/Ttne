<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Periodicite;
use App\Services\Core\PeriodiciteService;
use Exception;
use Illuminate\Http\Request;

class PeriodiciteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $historiques = Historique::where(
            'record_type',
            Periodicite::class
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

        if ($request->ajax()) {

            return response()->json([

                'historiques' => view(
                    'dependances.templates.admins.gestions.parametrages.periodicites._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages()

            ]);
        }

        return view(
            'dependances.templates.admins.gestions.parametrages.periodicites.periodicite',
            [

                'PeriodiciteT' => Periodicite::where(
                    'supprimer',
                    0
                )->count(),

                'PeriodiciteTC' => Periodicite::where(
                    'supprimer',
                    1
                )->count(),

                'periodicites' => Periodicite::where(
                    'supprimer',
                    0
                )
                ->orderBy('nom')
                ->get(),

                'historiques' => $historiques

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

            'code' => 'required|string|max:255|unique:periodicites,code',

            'unite' => 'required|string|max:255',

            'valeur' => 'required|integer|min:1',

            'description' => 'nullable|string',

            'active' => 'nullable|boolean',

        ]);

        try {

            PeriodiciteService::store($data);

            toast(
                'Périodicité créée avec succès',
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

            'id' => 'required|exists:periodicites,id',

            'nom' => 'required|string|max:255',

            'code' => 'required|string|max:255|unique:periodicites,code,' . $request->id,

            'unite' => 'required|string|max:255',

            'valeur' => 'required|integer|min:1',

            'description' => 'nullable|string',

            'active' => 'nullable|boolean',

        ]);

        try {

            PeriodiciteService::update($data);

            toast(
                'Périodicité modifiée avec succès',
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

            'id' => 'required|exists:periodicites,id',

        ]);

        try {

            PeriodiciteService::mettreEnCorbeille(
                $data
            );

            toast(
                'Périodicité supprimée',
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

            'ids.*' => 'exists:periodicites,id',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = PeriodiciteService::mettreSelectionEnCorbeille(
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

            $count = PeriodiciteService::mettreEnCorbeilleAll();

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
