<?php

namespace App\Http\Controllers;

use App\Models\MessageTicket;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Importance;
use App\Models\Gestionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Affiche la liste de tous les tickets
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    public function ticketByUser()
    {
        $tickets = Ticket::where('ref_user', Auth::user()->id)->get();
        return view('ticket.index', compact('tickets'));
    }

    // Affiche le formulaire de création d'un nouveau ticket
    public function create() {
        $importances = Importance::all();
        return view('ticket.create', compact('importances'));
    }

    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['fin' => 1]);
        return redirect()->route('ticket.index');
    }

    public function open($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['fin' => 0]);
        return redirect()->route('ticket.index');
    }

    // Enregistre un nouveau ticket dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'objet' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_user' => 'required|exists:users,id',
            'ref_importance' => 'required|exists:importances,id',
            'date' => 'required|date',
        ]);

        Ticket::create($request->all());
        return redirect()->route('ticket.index');
    }

    // Affiche le formulaire d'édition d'un ticket existant
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $importances = Importance::all();
        return view('ticket.edit', compact('ticket', 'importances'));
    }

    // Met à jour un ticket existant dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'objet' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_user' => 'required|exists:users,id',
            'ref_importance' => 'required|exists:importances,id',
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

        // Delete associated messages
        MessageTicket::where('ref_ticket', $id)->delete();

        // Delete the ticket
        $ticket->delete();

        if (Auth::user()->role == 5) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('ticket.index');
        }
    }

    // Affiche les détails d'un ticket spécifique
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        $messages = MessageTicket::where('ref_ticket', $id)->get();
        return view('ticket.show', compact('ticket', 'messages'));
    }
}
