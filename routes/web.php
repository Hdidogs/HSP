<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\HopitalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvenementAvantController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OffreAvantController;
use App\Http\Controllers\AdminController;


// Route vers les offres d'emploi

Route::get('/', [AccueilController::class, 'index'])->name('dashboard');

Route::get('/evenement/{evenement}/inscrits', [EvenementController::class, 'inscrits'])->name('evenement.inscrits');
Route::get('/offres/{offre}/postuler', [OffreController::class, 'showPostulerForm'])->name('offre.postuler');
Route::post('/offres/{offre}/postuler', [OffreController::class, 'postuler'])->name('offre.postuler.submit');
Route::put('/offres/{offre}/cloturer', [OffreController::class, 'cloturer'])->name('offre.cloturer');
//Route::resource('specialite', SpecialiteController::class);
//Route::resource('gestionnaire', GestionnaireController::class);
Route::get('ticket', [TicketController::class, "ticketByUser"])->name('ticket.index');
Route::get('ticket/close/{ticket}', [TicketController::class, 'close'])->name('ticket.close');
Route::get('ticket/open/{ticket}', [TicketController::class, 'open'])->name('ticket.open');

Route::get('ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('ticket/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get('ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::get('ticket/{ticket}/show', [TicketController::class, 'show'])->name('ticket.show');
Route::get('ticket/destroy/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
use App\Http\Controllers\MessagesTicket;

Route::get('user/validate/{userId}', [UserController::class, 'validate'])->name('user.validate');
Route::get('user/reject/{userId}', [UserController::class, 'reject'])->name('user.reject');

// Routes for MessagesTicket
Route::post('messagesticket/store', [MessagesTicket::class, 'store'])->name('messagesticket.store');

//Route::resource('hopitaux', HopitalController::class);
Route::resource('post', PostController::class);
Route::resource('forum', ForumController::class);
Route::resource('offre', OffreController::class);
//Route::resource('evenement', EvenementController::class); // PAS TOUCHER
//Route::resource('entreprise', EntrepriseController::class);
//Route::resource('etablissement', EtablissementController::class);

Route::post('/specialite/create', [SpecialiteController::class, 'store'])->name('specialite.store');
Route::post('/hopital/create', [HopitalController::class, 'store'])->name('hopital.store');
Route::post('/entreprise/create', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::post('/etablissement/create', [EtablissementController::class, 'store'])->name('etablissement.store');

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

Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');


Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::resource('post', PostController::class)->except(['show']);

#nouvell
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::post('/messages/{message}/upvote', [MessageController::class, 'upvote'])->name('messages.upvote');
Route::post('/messages/{message}/downvote', [MessageController::class, 'downvote'])->name('messages.downvote');

Route::post('reply', [ReplyController::class, 'store'])->name('reply.store');

Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/forum/{forum}/{message}', [ReplyController::class, 'show'])->name('forum.reply.show');
Route::get('/forum/{forum}/edit', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/forum/{forum}', [ForumController::class, 'update'])->name('forum.update');
Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store');
Route::get('/reply/{reply}/edit', [ReplyController::class, 'edit'])->name('reply.edit');
Route::put('/reply/{reply}', [ReplyController::class, 'update'])->name('reply.update');
Route::delete('/reply/{reply}', [ReplyController::class, 'destroy'])->name('reply.destroy');
Route::get('/forum/{forum}/{message}', [ReplyController::class, 'show'])->name('forum.reply.show');

Route::get('/cvs/{filename}', function ($filename) {
    $path = storage_path('app/public/cvs/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->name('cvs.show');

Route::delete('/evenements/{evenement}/users/{user}', [EvenementController::class, 'removeUserFromEvent'])
    ->name('evenement.removeUserFromEvent');

Route::get('/evenements/{evenement}', [EvenementController::class, 'show'])->name('evenements.show');
Route::resource('offre', OffreController::class);
Route::get('/dashboard', [OffreAvantController::class, 'dashboard'])->name('dashboard');
Route::get('/', [OffreAvantController::class, 'dashboard'])->name('dashboard');

Route::post('/evenement/{evenement}/inscription', [EvenementController::class, 'inscription'])->name('evenement.inscription');
Route::delete('/evenement/{evenement}/desinscription', [EvenementController::class, 'desinscription'])->name('evenement.desinscription');
Route::get('/evenement/{evenement}', [EvenementController::class, 'show'])->name('evenement.show');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/show', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/cvs/{filename}', function ($filename) {
    $path = 'storage/app/private/cvs/' . $filename;

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('cvs.show');
