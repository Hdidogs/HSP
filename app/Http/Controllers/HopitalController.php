<?php
namespace App\Http\Controllers;

use App\Models\Hopital;
use Illuminate\Http\Request;

class HopitalController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'rue' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'cp' => 'required|string|max:7',
        ]);

        $hopital = Hopital::create($validatedData);

        return response()->json([
            'success' => true,
            'item' => $hopital
        ]);
    }

}
