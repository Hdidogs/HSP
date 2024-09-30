<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function index()
    {
        $specialites = Specialite::all();
        return view('specialite.index', compact('specialites'));
    }

    public function create()
    {
        return view('specialite.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:191',
        ]);

        Specialite::create($request->all());

        return redirect()->route('specialite.index');
    }

    public function edit(Specialite $specialite)
    {
        return view('specialite.edit', compact('specialite'));
    }

    public function update(Request $request, Specialite $specialite)
    {
        $request->validate([
            'libelle' => 'required|string|max:191',
        ]);

        $specialite->update($request->all());

        return redirect()->route('specialite.index');
    }

    public function destroy(Specialite $specialite)
    {
        $specialite->delete();
        return redirect()->route('specialite.index');
    }
}
