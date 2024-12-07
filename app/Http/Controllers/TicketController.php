<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Importance;
use App\Models\Gestionnaire;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Affiche la liste de tous les tickets
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    // Affiche le formulaire de création d'un nouveau ticket
    public function create()
    {
        $users = User::all();
        $importances = Importance::all();
        $gestionnaires = Gestionnaire::all();
        return view('ticket.create', compact('users', 'importances', 'gestionnaires'));
    }

    // Enregistre un nouveau ticket dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'objet' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_user' => 'required|exists:users,id',
            'ref_importance' => 'required|exists:importances,id',
            'ref_gestionnaire' => 'required|exists:gestionnaires,id',
            'date' => 'required|date',
        ]);

        Ticket::create($request->all());
        return redirect()->route('ticket.index');
    }

    // Affiche le formulaire d'édition d'un ticket existant
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $users = User::all();
        $importances = Importance::all();
        $gestionnaires = Gestionnaire::all();
        return view('tickets.edit', compact('ticket', 'users', 'importances', 'gestionnaires'));
    }

    // Met à jour un ticket existant dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'objet' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_user' => 'required|exists:users,id',
            'ref_importance' => 'required|exists:importances,id',
            'ref_gestionnaire' => 'required|exists:gestionnaires,id',
            'date' => 'required|date',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return redirect()->route('ticket.index');
    }

    // Supprime un ticket de la base de données
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index');
    }

    // Affiche les détails d'un ticket spécifique
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.show', compact('ticket'));
    }
}