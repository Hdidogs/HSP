<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MessageController extends Controller
{
    use AuthorizesRequests;
    // Enregistre un nouveau message dans un forum
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'ref_user' => 'required|exists:users,id',
            'libelle' => 'required|string|max:255',
            'ref_forum' => 'required|exists:forums,id',
        ]);

        // Créer le message
        Message::create([
            'libelle' => $validatedData['libelle'],
            'ref_user' => $validatedData['ref_user'],
            'ref_forum' => $validatedData['ref_forum'],
            'downvote' => 0,
            'upvote' => 0,
        ]);

        // Rediriger vers le forum
        return redirect()->route('forum.show', ['forum' => $validatedData['ref_forum']])->with('success', 'Message envoyé avec succès.');
    }

    // Met à jour un message existant
    public function update(Request $request, Message $message)
    {
        //$this->authorize('update', $message);

        $request->validate([
            'libelle' => 'required|string',
        ]);

        $message->update([
            'libelle' => $request->libelle,
        ]);

        return redirect()
            ->route('forum.show', ['forum' => $message->ref_forum])
            ->with('success', 'Message mis à jour avec succès.');
    }

    // Affiche le formulaire d'édition d'un message
    public function edit(Message $message)
    {
        //$this->authorize('update', $message);
        return view('messages.edit', compact('message'));
    }

    // Supprime un message
    public function destroy(Message $message)
    {
        //$this->authorize('delete', $message);

        $message->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }

    // Incrémente le nombre d'upvotes d'un message
    public function upvote(Message $message)
    {
        $message->increment('upvote');
        return $message;
    }

    // Incrémente le nombre de downvotes d'un message
    public function downvote(Message $message)
    {
        $message->increment('downvote');
        return $message;
    }
}
