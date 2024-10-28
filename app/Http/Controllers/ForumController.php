<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();
        return view('forum.index', compact('forums'));
    }

    public function show(Forum $forum)
    {
        // Charger les relations nécessaires, par exemple les messages du forum
        $forum->load('messages');

        return view('forum.show', compact('forum'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:191',
        ]);

        Forum::create([
            'nom' => $request->nom,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.index');
    }
    public function edit(Forum $forum)
    {
        return view('forum.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'nom' => 'required|string|max:191',
        ]);

        $forum->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('forum.index');
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index');
    }
}
