<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;
use App\Models\Historique;
use App\Models\Parametre;
use App\Models\TypeParametre;
use App\Services\Core\ParametreService;
use Exception;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $historiques = Historique::where('record_type', Parametre::class)->latest()->paginate(5,['*'], 'history_page');
        /*
            =========================================================
            AJAX
            =========================================================
        */
        if($request->ajax()){
            return response()->json([
                'historiques' => view('dependances.templates.admins.gestions.parametrages.parametres._consoms.historique', compact('historiques'))->render(),
                'current_page' => $historiques->currentPage(),
                'last_page' => $historiques->lastPage(),
                'has_more_pages' => $historiques->hasMorePages()
            ]);
        }

        return view(
            'dependances.templates.admins.gestions.parametrages.parametres.parametre',
            [

                'ParametreT' => Parametre::where('supprimer',0)->count(),
                'ParametreTC' => Parametre::where('supprimer',1)->count(),
                'parametres' => Parametre::where( 'supprimer',0)->orderBy('libelle')->get(),
                'typeparametres' => TypeParametre::where('supprimer', 0)->orderBy('libelle')->get(),
                'historiques' => $historiques

            ]
        );
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:255',
            'type_parametre_id' => 'required|exists:type_parametres,id',
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        try {
            ParametreService::store($data);
            toast('Paramètre créé avec succès','success' );
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

            'id' => 'required|exists:parametres,id',
            'type_parametre_id' => 'required|exists:type_parametres,id',
            'code' => 'required|string|max:255',
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {

            ParametreService::update($data);

            toast(
                'Paramètre modifié avec succès',
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

            'id' => 'required|exists:parametres,id',
        ]);

        try {

            ParametreService::mettreEnCorbeille(
                $data
            );

            toast(
                'Paramètre supprimé',
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
            'ids.*' => 'exists:parametres,id',
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE (LOGIQUE METIER)
            |--------------------------------------------------------------------------
            */

            $count = ParametreService::mettreSelectionEnCorbeille(
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

            $count = ParametreService::mettreEnCorbeilleAll();

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
