<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'ref_post' => 'required|exists:posts,id',
        ]);

        $message = Message::create([
            'libelle' => $request->libelle,
            'upvote' => 0,
            'downvote' => 0,
            'ref_user' => Auth::id(),
            'ref_post' => $request->ref_post,
        ]);

        return $message->load('sender');
    }

    public function update(Request $request, Message $message)
    {
        $this->authorize('update', $message);

        $request->validate([
            'libelle' => 'required|string',
        ]);

        $message->update([
            'libelle' => $request->libelle,
        ]);

        return $message;
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);

        $message->delete();

        return response()->json(['message' => 'Message deleted successfully']);
    }

    public function upvote(Message $message)
    {
        $message->increment('upvote');
        return $message;
    }

    public function downvote(Message $message)
    {
        $message->increment('downvote');
        return $message;
    }
}