<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

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
            'titre' => 'required',
            'description' => 'required',
            'missionlibre' => 'required',
            'salaire' => 'required'
        ]);

        $data = $request->all();
        $data['ref_user'] = auth()->id(); // Définir automatiquement l'ID de l'utilisateur authentifié

        Offre::create($data);

        return redirect()->route('offre.index')
            ->with('success', 'Offre créée avec succès.');
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
            'titre' => 'required',
            'description' => 'required',
            'missionlibre' => 'required',
            'salaire' => 'required',
            'ref_user' => 'required'
        ]);

        $offre->update($request->all());

        return redirect()->route('offre.index')
            ->with('success', 'Offre modifiée avec succès.');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offre.index')
            ->with('success', 'Offre supprimée avec succès.');
    }
}
