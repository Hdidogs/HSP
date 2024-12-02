<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $users = User::all();
        $tickets = Ticket::all();
        return view('admin.index', compact('users', 'tickets'));
    }

    public function show($id)
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function cancelValidation($id)
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $user = User::findOrFail($id);
        // Logique pour annuler la validation
        // Par exemple : $user->validated = false; $user->save();

        return redirect()->back()->with('success', 'Validation annulée avec succès.');
    }
}
