<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiviteController extends Controller
{
    // Afficher la liste des activités
    public function index()
    {
        $activites = Activite::all();
        return view('activite.index', compact('activites'));
    }

    // Afficher le formulaire de création d'une activité
    public function create()
    {
        $users = User::all();
        return view('activite.create',compact('users'));
    }

    // Stocker une nouvelle activité
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'nb_place' => 'required|integer|min:1',
        ]);

        // Créer l'activité et lier l'utilisateur connecté
        $activite = new Activite();
        $activite->titre = $validatedData['titre'];
        $activite->desc = $validatedData['desc'];
        $activite->nb_place = $validatedData['nb_place'];

        // Lier l'utilisateur connecté comme créateur
        $activite->ref_user = Auth::id();  // Récupérer l'ID de l'utilisateur connecté

        // Sauvegarder l'activité
        $activite->save();

        return redirect()->route('activite.index')->with('success', 'Activité créée avec succès.');
    }

    // Afficher une activité spécifique
    public function show(Activite $activite)
    {
        return view('activite.show', compact('activite'));
    }

    // Afficher le formulaire d'édition d'une activité
    public function edit(Activite $activite)
    {
        return view('activite.edit', compact('activite'));
    }

    // Mettre à jour une activité
    public function update(Request $request, Activite $activite)
    {
        $request->validate([
            'titre' => 'required',
            'desc' => 'required',
            'nb_place' => 'required|integer',
            'ref_user' => 'required|integer',
        ]);

        $activite->update($request->all());

        return redirect()->route('activite.index')
            ->with('success', 'Activité mise à jour avec succès.');
    }

    // Supprimer une activité
    public function destroy(Activite $activite)
    {
        $activite->delete();

        return redirect()->route('activite.index')
            ->with('success', 'Activité supprimée avec succès.');
    }
}
