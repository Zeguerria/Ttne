<?php

use App\Http\Controllers\CorbeilleController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\TypeParametreController;
use App\Models\Historique;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test-historique', function () {
//     Historique::create([
//         'user_id' => 1, // assure-toi que l'utilisateur existe
//         'action' => 'Test',
//     ]);

//     return "OK";
// });
// LES REDIRECTIONS DEBUT
Route::get('/dashboard', 'App\Http\Controllers\RouteController@lesdirections')->name('redirects');
Route::get('Admin/Home','App\Http\Controllers\RouteController@AdminHome')->name('AdminHome');
//TYPE DE PARAMETRE DEBUT
                // CHEMIN DES PAGES DEBUT
                Route::get('Admin/Parametrages/Type-Parametre', [TypeParametreController::class, 'index'])->name('ADM-TP-type');
                Route::get('Admin/Corebeille/Type-Parametre', [TypeParametreController::class, 'indexCorbeille'])->name('ADM-TPC-tp');
                //CHEMIN DES PAGE FIN
            //AUTRES FUNCTION DEBUT
            Route::post(
    '/select/corbeille/typeparametre',
    [TypeParametreController::class, 'corbeilleSelection']
);
                Route::post('/Admin/Parametrages/Type-Parametre/Statut', [TypeParametreController::class, 'StatutTp'])->name('StatutTp');

                // Route::get('Admin/Corebeille/Type-Parametre/Tout-Destroy', [TypeParametreController::class, 'destroyTous'])->name('D-All-AD-TPP');
                Route::post('Admin/Corebeille/Type-Parametre/Tout-Soft', [TypeParametreController::class, 'corbeilleAll'])->name('C-All-TPP-TP');
                Route::get('Admin/Corebeille/Type-Parametre/Tout-Refresh', [TypeParametreController::class, 'recupTousCorbeille'])->name('R-All-AD-TPP');
            //AUTRES FUNCTION FIN
            //FONCTIONS DEBUT
                Route::post('AjouterTypeParametre', [TypeParametreController::class, 'store'])->name('AjouterTypeParametre');
                Route::post('ModifierTypeParametre', [TypeParametreController::class, 'update'])->name('ModifierTypeParametre');
                Route::post('CorbeilleTypeParametre', [TypeParametreController::class, 'corbeille'])->name('CorbeilleTypeParametre');
                Route::post('SupprimerTypeParametre', [TypeParametreController::class, 'destroy'])->name('SupprimerTypeParametre');
                Route::post('RecupTypeParametre', [TypeParametreController::class, 'recupUnCorbeille'])->name('RecupTypeParametre');
            // FONCTION FIN
        //TYPE DE PARAMETRE FIN
        //PARAMETRE DEBUT
                // CHEMIN DES PAGES DEBUT
                Route::get('Admin/Parametrages/Parametre', [ParametreController::class, 'index'])->name('ADM-P-par');
                Route::get('Admin/Corebeille/Parametre', [ParametreController::class, 'indexCorbeille'])->name('ADM-PC-par');
                //CHEMIN DES PAGE FIN
            //AUTRES FUNCTION DEBUT
                Route::post('/Admin/Parametrages/Parametre/Statut', [ParametreController::class, 'StatutTp'])->name('StatutTp');

                Route::get('Admin/Corebeille/Parametre/Tout-Destroy', [ParametreController::class, 'destroyTous'])->name('D-All-AD-PAR');
                Route::get('Admin/Corebeille/Parametre/Tout-Soft', [ParametreController::class, 'corbeilleAll'])->name('C-All-P-PAR');
                Route::get('Admin/Corebeille/Parametre/Tout-Refresh', [ParametreController::class, 'recupTousCorbeille'])->name('R-All-AD-PAR');
            //AUTRES FUNCTION FIN
            //FONCTIONS DEBUT
                Route::post('AjouterParametre', [ParametreController::class, 'store'])->name('AjouterParametre');
                Route::post('ModifierParametre', [ParametreController::class, 'update'])->name('ModifierParametre');
                Route::post('CorbeilleParametre', [ParametreController::class, 'corbeille'])->name('CorbeilleParametre');


            // FONCTION FIN
        //PARAMETRE FIN



// CORBEILLE DEBUT
    // ROUTE DEBUT
        Route::get('Admin/Corbeilles/Corbeille', [CorbeilleController::class, 'index'])->name('ADM-CRB-CBL');
        Route::post('/select/supprimer/corbeille',[CorbeilleController::class, 'supprimerSelectionCorbeille'])->name('C-SEL-SUPP-CORBEILLE');
        Route::post('/select/restaurer/corbeille',[CorbeilleController::class, 'restaurerSelectionCorbeille'])->name('C-SEL-REST-CORBEILLE');
        Route::post('Restorer/Element/Corbeille',[CorbeilleController::class, 'restaurerCorbeille'])->name('RestorerCorbeille');
        Route::post('/Supprimer/Element/Corbeille',[CorbeilleController::class, 'supprimerDefinitivement'])->name('SupprimerCorbeille');
        Route::post('Admin/Corebeilles/Tout-Supprimer', [CorbeilleController::class, 'supprimerToutCorbeille'])->name('C-All-CBL-CBL');
        Route::post('Admin/Corebeilles/restaurer/Tout-Restorer', [CorbeilleController::class, 'restaurerTout'])->name('C-All-Restore-Corbeille');


    // ROUTE FIN
// CORBEILLE FIN

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
