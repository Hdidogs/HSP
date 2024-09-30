<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function index()
    {
        $offres = Offre::latest()->get();
        return view('offre.index', compact('offres'));
    }

    public function create()
    {
        return view('offre.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $validatedData['ref_user'] = Auth::id();

        Offre::create($validatedData);

        return redirect()->route('offre.index');
    }

    public function show(Offre $offre)
    {
        return view('offre.show', compact('offre'));
    }

    public function edit(Offre $offre)
    {
        return view('offre.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $offre->update($validatedData);

        return redirect()->route('offre.index');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offre.index');
    }
}
