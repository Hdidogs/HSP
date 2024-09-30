<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function index()
    {
        $offres = Offre::all();
        return view('offre.index', compact('offres'));
    }

    public function create()
    {
        return view('offre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:191',
            'description' => 'required|string',
            'mission' => 'required|string',
            'salaire' => 'nullable|numeric',
        ]);

        Offre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'mission' => $request->mission,
            'salaire' => $request->salaire,
            'ref_user' => Auth::id(),
        ]);

        return redirect()->route('offre.index');
    }

    public function show(Offre $offre)
    {
        return view('offre.show', compact('offre'));
    }

    public function edit(Offre $offre)
    {
        return view('offre.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'titre' => 'required|string|max:191',
            'description' => 'required|string',
            'mission' => 'required|string',
            'salaire' => 'nullable|numeric',
        ]);

        $offre->update($request->all());

        return redirect()->route('offre.index');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('offre.index');
    }
}
