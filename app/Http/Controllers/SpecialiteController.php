<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    // Affiche la liste de toutes les spécialités
    public function index()
    {
        $specialites = Specialite::all();
        return view('specialite.index', compact('specialites'));
    }

    // Affiche le formulaire de création d'une nouvelle spécialité
    public function create()
    {
        return view('specialite.create');
    }

    // Enregistre une nouvelle spécialité dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:191',
        ]);

        Specialite::create($request->all());

        return redirect()->route('specialite.index');
    }

    // Affiche le formulaire d'édition d'une spécialité existante
    public function edit(Specialite $specialite)
    {
        return view('specialite.edit', compact('specialite'));
    }

    // Met à jour une spécialité existante dans la base de données
    public function update(Request $request, Specialite $specialite)
    {
        $request->validate([
            'libelle' => 'required|string|max:191',
        ]);

        $specialite->update($request->all());

        return redirect()->route('specialite.index');
    }

    // Supprime une spécialité de la base de données
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();
        return redirect()->route('specialite.index');
    }
}