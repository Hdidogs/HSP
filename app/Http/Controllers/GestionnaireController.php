<?php

namespace App\Http\Controllers;

use App\Models\Gestionnaire;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    // Affiche la liste de tous les gestionnaires
    public function index()
    {
        $gestionnaires = Gestionnaire::all();
        return view('gestionnaire.index', compact('gestionnaires'));
    }

    // Affiche le formulaire de création d'un gestionnaire
    public function create()
    {
        return view('gestionnaire.create');
    }

    // Enregistre un nouveau gestionnaire
    public function store(Request $request)
    {
        $request->validate([
            'ref_user' => 'required|integer',
        ]);

        Gestionnaire::create($request->all());
        return redirect()->route('gestionnaire.index');
    }

    // Affiche les détails d'un gestionnaire spécifique
    public function show($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        return view('gestionnaire.show', compact('gestionnaire'));
    }

    // Affiche le formulaire d'édition d'un gestionnaire
    public function edit($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        return view('gestionnaire.edit', compact('gestionnaire'));
    }

    // Met à jour les informations d'un gestionnaire
    public function update(Request $request, $ref_user)
    {
        $request->validate([
            'ref_user' => 'required|integer',
        ]);

        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        $gestionnaire->update($request->all());
        return redirect()->route('gestionnaire.index');
    }

    // Supprime un gestionnaire
    public function destroy($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        $gestionnaire->delete();
        return redirect()->route('gestionnaire.index');
    }
}