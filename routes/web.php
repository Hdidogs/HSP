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
use App\Http\Controllers\MessageController;

// Route vers les offres d'emploi

Route::get('/', function () {
    return view('welcome');
});

Route::get('/offres/{offre}/postuler', [OffreController::class, 'showPostulerForm'])->name('offre.postuler');
Route::post('/offres/{offre}/postuler', [OffreController::class, 'postuler'])->name('offre.postuler.submit');
Route::put('/offres/{offre}/cloturer', [OffreController::class, 'cloturer'])->name('offre.cloturer');
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
Route::post('evenement/store', [EvenementController::class, 'store'])->name('evenement.store');
Route::get('evenement/{evenement}/edit', [EvenementController::class, 'edit'])->name('evenement.edit');
Route::put('evenement/{evenement}', [EvenementController::class, 'update'])->name('evenement.update');
Route::delete('evenement/{evenement}', [EvenementController::class, 'destroy'])->name('evenement.destroy');
Route::post('/evenement/{evenement}/inscription', [EvenementController::class, 'inscription'])->name('evenement.inscription');
Route::post('/evenement/{evenement}/inscription', [EvenementController::class, 'inscription'])->name('evenement.inscription');
Route::delete('/evenement/{evenement}/desinscription', [EvenementController::class, 'desinscription'])->name('evenement.desinscription');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::resource('post', PostController::class)->except(['show']);
#nouvell    
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::post('/messages/{message}/upvote', [MessageController::class, 'upvote'])->name('messages.upvote');
Route::post('/messages/{message}/downvote', [MessageController::class, 'downvote'])->name('messages.downvote');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');
});
