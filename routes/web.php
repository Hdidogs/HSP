<?php

use App\Http\Controllers\HopitalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OffreController;

Route::resource('offre', OffreController::class);
Route::resource('evenement', EvenementController::class);
Route::resource('entreprise', EntrepriseController::class);
Route::resource('etablissement', EtablissementController::class);
Route::resource('activite', ActiviteController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::resource('hopitaux', HopitalController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
