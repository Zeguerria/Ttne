<?php

use App\Models\Historique;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-historique', function () {
    Historique::create([
        'user_id' => 1, // assure-toi que l'utilisateur existe
        'action' => 'Test',
    ]);

    return "OK";
});
// LES REDIRECTIONS DEBUT
Route::get('/dashboard', 'App\Http\Controllers\RouteController@lesdirections')->name('redirects');
Route::get('Admin/Home','App\Http\Controllers\RouteController@AdminHome')->name('AdminHome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
