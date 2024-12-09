<?php

namespace App\Http\Controllers;

use App\Models\MessageTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesTicket extends Controller
{
    // Enregistre un nouveau message
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
            'ref_user' => 'required|exists:users,id',
            'ref_ticket' => 'required|exists:tickets,id',
        ]);

        // Créer le message
        MessageTicket::create([
            'libelle' => $validatedData['libelle'],
            'ref_user' => $validatedData['ref_user'],
            'ref_ticket' => $validatedData['ref_ticket'],
        ]);

        // Rediriger ou retourner une réponse appropriée
        return redirect()->back()->with('success', 'Message envoyé avec succès.');
    }

    // Met à jour un message existant
    public function update(Request $request, MessageTicket $messageTicket)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $messageTicket->update([
            'libelle' => $request->libelle,
        ]);

        return redirect()->back()->with('success', 'Message mis à jour avec succès.');
    }

    // Supprime un message
    public function destroy(MessageTicket $messageTicket)
    {
        $messageTicket->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }
}
