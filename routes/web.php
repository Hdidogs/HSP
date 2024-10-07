<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\SpecialiteController;

// Route vers les offres d'emploi

Route::get('/', function () {
    return view('welcome');
});

Route::resource('specialite', SpecialiteController::class);
Route::resource('gestionnaire', GestionnaireController::class);
Route::resource('ticket', TicketController::class);
Route::resource('hopitaux', HopitalController::class);
Route::resource('post', PostController::class);
Route::resource('forum', ForumController::class);
Route::resource('offre', OffreController::class);
//Route::resource('evenement', EvenementController::class); // PAS TOUCHER
Route::resource('entreprise', EntrepriseController::class);
Route::resource('etablissement', EtablissementController::class);
Route::resource('activite', ActiviteController::class);
Route::get('joboffers', [OffreController::class, 'index'])->name('joboffers.index');
Route::get('activity', [ActiviteController::class, 'index'])->name('activity.index');
Route::get('chat', [ForumController::class, 'index'])->name('chat.index');
Route::get('evenement', [EvenementController::class, 'index'])->name('evenement.index');
Route::get('evenement/create', [EvenementController::class, 'create'])->name('evenement.create');
Route::get('evenement/store', [EvenementController::class, 'store'])->name('evenement.store');

    
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');
});
