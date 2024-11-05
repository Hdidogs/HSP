<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{

    // Affiche la liste de toutes les entreprises
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprise.index', compact('entreprises'));
    }

    // Affiche le formulaire de création d'une entreprise
    public function create()
    {
        return view('entreprise.create');
    }

    // Enregistre une nouvelle entreprise dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'numero' => 'required|number|max:10',
        ]);

        Entreprise::create($validated);

        return redirect()->route('entreprise.index');
    }

    // Affiche le formulaire d'édition d'une entreprise
    public function edit(Entreprise $entreprise)
    {
        return view('entreprise.edit', compact('entreprise'));
    }

    // Met à jour les informations d'une entreprise existante
    public function update(Request $request, Entreprise $entreprise)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
        ]);

        $entreprise->update($validated);

        return redirect()->route('entreprise.index');
    }
}