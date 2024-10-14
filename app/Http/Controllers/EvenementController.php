<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Inscription;
use Illuminate\Support\Facades\DB;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenement.index', compact('evenements'));
    }

    public function create()
    {
        return view('evenement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'elementrequis' => 'required|string|max:255',
            'nb_place' => 'required|integer',
        ]);

        Evenement::create($request->all());

        return redirect()->route('evenement.index')->with('status', 'Événement créé avec succès!');
    }

    public function edit(Evenement $evenement)
    {
        return view('evenement.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'elementrequis' => 'required|string|max:255',
            'nb_place' => 'required|integer',
        ]);

        $evenement->update($request->all());

        return redirect()->route('evenement.index')->with('status', 'Événement mis à jour avec succès!');
    }

    public function destroy(Evenement $evenement)
    {
        // Supprimer toutes les inscriptions liées à cet événement
        Inscription::where('ref_evenement', $evenement->id)->delete();

        // Supprimer l'événement
        $evenement->delete();

        return redirect()->route('evenement.index')->with('status', 'Événement et toutes les inscriptions associées supprimés avec succès!');
    }


    public function inscription(Request $request, Evenement $evenement)
    {
        // Vérifiez si l'utilisateur est déjà inscrit à cet événement
        $inscriptionExistante = Inscription::where('ref_evenement', $evenement->id)
            ->where('ref_user', auth()->id())
            ->first();

        if ($inscriptionExistante) {
            return redirect()->route('evenement.index')->with('error', 'Vous êtes déjà inscrit à cet événement.');
        }

        // Créer une nouvelle inscription
        Inscription::create([
            'ref_evenement' => $evenement->id,
            'ref_user' => auth()->id(), // Assurez-vous que l'utilisateur est authentifié
        ]);

        return redirect()->route('evenement.index')->with('status', 'Vous êtes bien inscrit. Merci !');
    }

    public function desinscription(Request $request, Evenement $evenement)
    {
        // Supprimer l'inscription de l'utilisateur à cet événement
        Inscription::where('ref_evenement', $evenement->id)
            ->where('ref_user', auth()->id())
            ->delete();

        return redirect()->route('evenement.index')->with('status', 'Vous êtes bien désinscrit. Merci !');
    }
}