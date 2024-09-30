<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller{

    public function index(){
        $entreprises = Entreprise::all();
        return view('entreprise.index', compact('entreprises'));
    }

    public function create(){
        return view('entreprise.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'numero' => 'required|number|max:10',
        ]);

        Entreprise::create($validated);

        return redirect()->route('entreprise.index');
    }

    public function edit(Entreprise $entreprise){
        return view('entreprise.edit', compact('entreprise'));
    }

    public function update(Request $request, Entreprise $entreprise){
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
        ]);

        $entreprise->update($validated);

        return redirect()->route('entreprise.index');
    }
}
