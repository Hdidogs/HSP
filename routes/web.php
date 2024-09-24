<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EntrepriseController;

Route::resource('entreprise', EntrepriseController::class);
Route::resource('etablissement', EtablissementController::class);
Route::resource('activite', ActiviteController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
