<?php

namespace App\Http\Controllers;

use App\Models\Habilitation;
use App\Http\Requests\StoreHabilitationRequest;
use App\Http\Requests\UpdateHabilitationRequest;
use App\Services\Core\HabilitationService;
use Exception;
use Illuminate\Http\Request;
use App\Models\Historique;


class HabilitationController extends Controller
{
     public function index(Request $request)
    {
        $historiques = Historique::where(
            'record_type',
            Habilitation::class
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
                    'dependances.templates.admins.gestions.access.habilitations._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages()

            ]);

        }

        return view(
            'dependances.templates.admins.gestions.access.habilitations.habilitation',
            [

                'HabilitationT' => Habilitation::where(
                    'supprimer',
                    0
                )->count(),

                'habilitationTC' => Habilitation::where(
                    'supprimer',
                    1
                )->count(),

                'habilitations' => Habilitation::where(
                    'supprimer',
                    0
                )
                ->orderBy('libelle')
                ->get(),

                'historiques' => $historiques

            ]
        );
    }

     public function store(Request $request)
    {
        $data = $request->validate([

            'code' => 'required|string|max:255',

            'libelle' => 'required|string|max:255',

            'description' => 'nullable|string',
        ]);

        try {

            HabilitationService::store($data);

            toast(
                'Habilitation créé avec succès',
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
        $data = $request->validate([

            'id' => 'required|exists:profils,id',

            'code' => 'required|string|max:255',

            'libelle' => 'required|string|max:255',

            'description' => 'nullable|string',
        ]);

        try {

            HabilitationService::update($data);

            toast(
                'Habilitation modifié avec succès',
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
    public function corbeille(Request $request)
    {
        $data = $request->validate([

            'id' => 'required|exists:habilitatins,id',
        ]);

        try {

            HabilitationService::mettreEnCorbeille(
                $data
            );

            toast(
                'Habilitation supprimé avec success',
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
    public function corbeilleSelection(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:habilitations,id',
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE (LOGIQUE METIER)
            |--------------------------------------------------------------------------
            */

            $count = HabilitationService::mettreSelectionEnCorbeille(
                $data['ids']
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE (AVEC COUNTER)
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) mis en supprimer avec succès',
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
    public function corbeilleAll(Request $request)
    {
        try {

            $count = HabilitationService::mettreEnCorbeilleAll();

            toast(
                $count . ' élément(s) supprimé(s)',
                'success'
            );

        } catch (Exception $e) {

            toast($e->getMessage(), 'error');
        }

        return back();
    }
}
