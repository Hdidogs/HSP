<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function index()
    {
        $forums = DB::table('forums')
            ->select('forums.*', 'users.nom as name')
            ->leftJoin('users', 'forums.ref_user', '=', 'users.id')
            ->latest('forums.created_at')
            ->get();

        return view('forum.index', compact('forums'));
    }

    public function show(Forum $forum)
    {
        return view('forum.show', compact('forum'));
    }

    public function create()
    {
        return view('forum.create');
    }

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

    public function edit(Forum $forum)
    {
        return view('forum.edit', compact('forum'));
    }

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

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Forum supprimé avec succès.');
    }
}
