<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'ref_user' => 'required|exists:users,id',
            'libelle'  => 'required|string|max:255',
            'ref_post' => 'required|exists:posts,id',
            'downvote' => 'required|integer',
            'upvote'   => 'required|integer',
        ]);

        $forum = Forum::create([
            'libelle' => $validatedData['libelle'],
            'ref_user' => Auth::user()->id,
            'ref_post' => $validatedData['ref_post'],
            'downvote' => 0,
            'upvote' => 0,
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum créé avec succès.');
    }
}
