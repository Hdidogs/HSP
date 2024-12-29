<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'rue' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'cp' => 'required|string|max:10',
        ]);

        $etablissement = Etablissement::create($validatedData);

        return response()->json([
            'success' => true,
            'etablissement' => $etablissement
        ]);
    }
}


