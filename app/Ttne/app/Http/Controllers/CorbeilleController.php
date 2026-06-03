<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorbeilleRequest;
use App\Http\Requests\UpdateCorbeilleRequest;
use App\Models\Corbeille;
use App\Models\Historique;
use App\Services\Core\CorbeilleService;
use Exception;
use Illuminate\Http\Request;

class CorbeilleController extends Controller
{

    public function index(Request $request)
{
    return view(
        'dependances.templates.admins.gestions.corbeilles.corbeille',
        [
            'corbeilleT' => Corbeille::count(),
            'corbeilleTC' => Corbeille::count(),
            'corbeilles' => Corbeille::orderBy('slug')->get(),
        ]
    );
}
    public function restaurerCorbeille(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            'id' => 'required|exists:corbeilles,id',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::restaurer(
                $data
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            toast(
                'Élément restauré avec succès',
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
    public function supprimerDefinitivement(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([
            'id' => 'required|exists:corbeilles,id'
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | SERVICE
            |--------------------------------------------------------------------------
            */

            CorbeilleService::supprimerDefinitivement(
                $data
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS
            |--------------------------------------------------------------------------
            */

            toast(
                'Élément supprimé définitivement avec succès.',
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
    public function supprimerToutCorbeille(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | SERVICE
            |--------------------------------------------------------------------------
            */

            $count = CorbeilleService::supprimerTout();

            /*
            |--------------------------------------------------------------------------
            | SUCCESS
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) supprimé(s) définitivement.',
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
    public function restaurerTout(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | SERVICE
            |--------------------------------------------------------------------------
            */

            $count = CorbeilleService::restaurerTout();

            /*
            |--------------------------------------------------------------------------
            | SUCCESS
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) restauré(s) avec succès',
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorbeilleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Corbeille $corbeille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corbeille $corbeille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorbeilleRequest $request, Corbeille $corbeille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corbeille $corbeille)
    {
        //
    }
    public function supprimerSelectionCorbeille(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:corbeilles,id',
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = CorbeilleService::supprimerSelection(
                $data['ids']
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) supprimé(s) définitivement',
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
    public function restaurerSelectionCorbeille(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:corbeilles,id',
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = CorbeilleService::restaurerSelection(
                $data['ids']
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) restauré(s) avec succès',
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
}
