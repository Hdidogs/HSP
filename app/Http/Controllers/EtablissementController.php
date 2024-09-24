<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    // Affiche la liste des établissements
    public function index()
    {
        $etablissements = Etablissement::all();
        return view('etablissement.index', compact('etablissements'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('etablissement.create');
    }

    // Enregistre un nouvel établissement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'pays' => 'required|string|max:255',
        ]);

        Etablissement::create($validated);

        return redirect()->route('etablissement.index');
    }

    // Affiche le formulaire de modification
    public function edit(Etablissement $etablissement)
    {
        return view('etablissement.edit', compact('etablissement'));
    }

    // Met à jour un établissement existant
    public function update(Request $request, Etablissement $etablissement)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'pays' => 'required|string|max:255',
        ]);

        $etablissement->update($validated);

        return redirect()->route('etablissement.index');
    }

    // Supprime un établissement
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        return redirect()->route('etablissement.index');
    }
}


