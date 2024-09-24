<?php
namespace App\Http\Controllers;

use App\Models\Hopital;
use Illuminate\Http\Request;

class HopitalController extends Controller
{
    // Afficher la liste des hôpitaux
    public function index()
    {
        $hopitaux = Hopital::all();
        return view('hopital.hopital-index', compact('hopitaux'));
    }

    // Afficher le formulaire de création d'un nouvel hôpital
    public function create()
    {
        return view('hopitaux.create');
    }

    // Enregistrer un nouvel hôpital dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'rue' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'cp' => 'required|string|max:10',
        ]);

        Hopital::create($request->all());

        return redirect()->route('hopitaux.index')->with('success', 'Hôpital créé avec succès.');
    }

    // Afficher un hôpital spécifique
    public function show($id)
    {
        $hopital = Hopital::findOrFail($id);
        return view('hopitaux.show', compact('hopital'));
    }

    // Afficher le formulaire d'édition d'un hôpital
    public function edit($id)
    {
        $hopital = Hopital::findOrFail($id);
        return view('hopitaux.edit', compact('hopital'));
    }

    // Mettre à jour les informations d'un hôpital
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'rue' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'cp' => 'required|string|max:10',
        ]);

        $hopital = Hopital::findOrFail($id);
        $hopital->update($request->all());

        return redirect()->route('hopitaux.index')->with('success', 'Hôpital mis à jour avec succès.');
    }

    // Supprimer un hôpital de la base de données
    public function destroy($id)
    {
        $hopital = Hopital::findOrFail($id);
        $hopital->delete();

        return redirect()->route('hopitaux.index')->with('success', 'Hôpital supprimé avec succès.');
    }
}

