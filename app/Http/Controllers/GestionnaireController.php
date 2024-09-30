<?php

namespace App\Http\Controllers;

use App\Models\Gestionnaire;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    public function index()
    {
        $gestionnaires = Gestionnaire::all();
        return view('gestionnaire.index', compact('gestionnaires'));
    }

    public function create()
    {
        return view('gestionnaire.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ref_user' => 'required|integer',
        ]);

        Gestionnaire::create($request->all());
        return redirect()->route('gestionnaire.index');
    }

    public function show($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        return view('gestionnaire.show', compact('gestionnaire'));
    }

    public function edit($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        return view('gestionnaire.edit', compact('gestionnaire'));
    }

    public function update(Request $request, $ref_user)
    {
        $request->validate([
            'ref_user' => 'required|integer',
        ]);

        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        $gestionnaire->update($request->all());
        return redirect()->route('gestionnaire.index');
    }

    public function destroy($ref_user)
    {
        $gestionnaire = Gestionnaire::findOrFail($ref_user);
        $gestionnaire->delete();
        return redirect()->route('gestionnaire.index');
    }
}
