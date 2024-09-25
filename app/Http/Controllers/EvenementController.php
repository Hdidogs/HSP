<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenement.index',compact('evenements'));
    }

    public function create()
    {
        return view('evenement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'elementrequis' => 'required',
            'nb_place' => 'required',
        ]);

        $evenement = new Evenement([
            'type' => $request->get('type'),
            'titre' => $request->get('titre'),
            'description' => $request->get('description'),
            'adresse' => $request->get('adresse'),
            'elementrequis' => $request->get('elementrequis'),
            'nb_place' => $request->get('nb_place'),
        ]);

        $evenement->save();
        return redirect('/evenement')->with('success', 'Evenement ajouté avec succès.');
    }

    public function edit($id)
    {
        $evenement = Evenement::find($id);
        return view('evenement.edit', compact('evenement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'elementrequis' => 'required',
            'nb_place' => 'required',
        ]);

        $evenement = Evenement::find($id);
        $evenement->type = $request->get('type');
        $evenement->titre = $request->get('titre');
        $evenement->description = $request->get('description');
        $evenement->adresse = $request->get('adresse');
        $evenement->elementrequis = $request->get('elementrequis');
        $evenement->nb_place = $request->get('nb_place');
        $evenement->save();

        return redirect('/evenement')->with('success', 'Evenement modifié avec succès.');
    }

    public function destroy($id)
    {
        $evenement = Evenement::find($id);
        $evenement->delete();

        return redirect('/evenement')->with('success', 'Evenement supprimé avec succès.');
    }
}
