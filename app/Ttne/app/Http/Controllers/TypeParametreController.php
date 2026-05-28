<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\TypeParametre;
use App\Services\Core\TypeParametreService;
use Exception;
use Illuminate\Http\Request;

class TypeParametreController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTE
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
{
   $historiques = Historique::where(
    'record_type',
    TypeParametre::class
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
                'dependances.templates.admins.gestions.parametrages.typeparametres._consoms.historique',
                compact('historiques')
            )->render(),

            'current_page' => $historiques->currentPage(),

            'last_page' => $historiques->lastPage(),

            'has_more_pages' => $historiques->hasMorePages()

        ]);

    }

    return view(
        'dependances.templates.admins.gestions.parametrages.typeparametres.typeparametre',
        [

            'TypeParametreT' => TypeParametre::where(
                'supprimer',
                0
            )->count(),

            'TypeParametreTC' => TypeParametre::where(
                'supprimer',
                1
            )->count(),

            'typeparametres' => TypeParametre::where(
                'supprimer',
                0
            )
            ->orderBy('libelle')
            ->get(),

            'historiques' => $historiques

        ]
    );
}
    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $data = $request->validate([

            'code' => 'required|string|max:255',

            'libelle' => 'required|string|max:255',

            'description' => 'nullable|string',
        ]);

        try {

            TypeParametreService::store($data);

            toast(
                'Type paramètre créé avec succès',
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
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $data = $request->validate([

            'id' => 'required|exists:type_parametres,id',

            'code' => 'required|string|max:255',

            'libelle' => 'required|string|max:255',

            'description' => 'nullable|string',
        ]);

        try {

            TypeParametreService::update($data);

            toast(
                'Type paramètre modifié avec succès',
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

            'id' => 'required|exists:type_parametres,id',
        ]);

        try {

            TypeParametreService::mettreEnCorbeille(
                $data
            );

            toast(
                'Type paramètre supprimé',
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
    | TOUT METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    

    /*
|--------------------------------------------------------------------------
| METTRE SELECTION EN CORBEILLE (BULK)
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
        'ids.*' => 'exists:type_parametres,id',
    ]);

    try {

        /*
        |--------------------------------------------------------------------------
        | APPEL SERVICE (LOGIQUE METIER)
        |--------------------------------------------------------------------------
        */

        $count = TypeParametreService::mettreSelectionEnCorbeille(
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

        $count = TypeParametreService::mettreEnCorbeilleAll();

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
