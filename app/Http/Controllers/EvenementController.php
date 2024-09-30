<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

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
            'type' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'elementrequis' => 'required|',
            'nb_place' => 'required|integer',
            ]);
        Evenement::create($request->all());
        return redirect()->route('evenement.index');
    }
    public function edit(Evenement $evenement)
    {
        return view('evenement.edit', compact('evenement'));
    }
    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'type' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'elementrequis' => 'required|',
            'nb_place' => 'required|integer',
            ]);
        $evenement->update($request->all());
        return redirect()->route('evenement.index');
    }
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenement.index');
    }
}
