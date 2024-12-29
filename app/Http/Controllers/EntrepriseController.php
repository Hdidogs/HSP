<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresseweb' => 'required|string|max:255',
            'numero' => 'required|string|max:255'
        ]);

        $entreprise = Entreprise::create($validatedData);

        return response()->json([
            'success' => true,
            'item' => $entreprise
        ]);
    }
}
