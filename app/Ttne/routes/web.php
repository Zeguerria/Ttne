<?php

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
                Route::post('SupprimerParametre', [ParametreController::class, 'destroy'])->name('SupprimerParametre');
                Route::post('RecupParametre', [ParametreController::class, 'recupUnCorbeille'])->name('RecupParametre');
            // FONCTION FIN
        //PARAMETRE FIN

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
