<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Importance;
use App\Models\Gestionnaire;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    public function create()
    {
        $users = User::all();
        $importances = Importance::all();
        $gestionnaires = Gestionnaire::all();
        return view('ticket.create', compact('users', 'importances', 'gestionnaires'));
    }

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

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $users = User::all();
        $importances = Importance::all();
        $gestionnaires = Gestionnaire::all();
        return view('tickets.edit', compact('ticket', 'users', 'importances', 'gestionnaires'));
    }

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

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.show', compact('ticket'));
    }
}
