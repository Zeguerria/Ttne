<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Profil;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Services\Core\ProfilService;
use Exception;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
     public function index(Request $request)
    {
        $historiques = Historique::where(
            'record_type',
            Profil::class
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
                    'dependances.templates.admins.gestions.access.profils._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages()

            ]);

        }

        return view(
            'dependances.templates.admins.gestions.access.profils.profil',
            [

                'profilT' => Profil::where(
                    'supprimer',
                    0
                )->count(),

                'profilTC' => Profil::where(
                    'supprimer',
                    1
                )->count(),

                'profils' => Profil::where(
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

            ProfilService::store($data);

            toast(
                'Profil créé avec succès',
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

            ProfilService::update($data);

            toast(
                'Profil modifié avec succès',
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

            'id' => 'required|exists:profils,id',
        ]);

        try {

            ProfilService::mettreEnCorbeille(
                $data
            );

            toast(
                'Profil supprimé avec success',
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
            'ids.*' => 'exists:profiLs,id',
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE (LOGIQUE METIER)
            |--------------------------------------------------------------------------
            */

            $count = ProfilService::mettreSelectionEnCorbeille(
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

            $count = ProfilService::mettreEnCorbeilleAll();

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
