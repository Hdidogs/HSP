<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $specialite = Specialite::create($validatedData);

        return response()->json([
            'success' => true,
            'item' => $specialite
        ]);
    }
}
