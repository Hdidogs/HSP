<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    // Affiche la liste des forums
    public function index()
    {
        $forums = DB::table('forums')
            ->select('forums.*', 'users.nom as name')
            ->leftJoin('users', 'forums.ref_user', '=', 'users.id')
            ->latest('forums.created_at')
            ->get();

        return view('forum.index', compact('forums'));
    }

    // Affiche un forum spécifique et ses messages
    public function show(Forum $forum)
    {
        $messages = $forum->messages()->with('sender')->get();
        return view('forum.show', compact('forum', 'messages'));
    }

    // Affiche le formulaire de création d'un forum
    public function create()
    {
        return view('forum.create');
    }

    // Enregistre un nouveau forum
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:191',
        ]);

        $forum = Forum::create([
            'nom' => $validatedData['nom'],
            'ref_user' => Auth::user()->id,
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum créé avec succès.');
    }

    // Affiche le formulaire d'édition d'un forum
    public function edit(Forum $forum)
    {
        return view('forum.edit', compact('forum'));
    }

    // Met à jour un forum existant
    public function update(Request $request, Forum $forum)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:191',
        ]);

        $forum->update([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum mis à jour avec succès.');
    }

    // Supprime un forum
    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Forum supprimé avec succès.');
    }
}