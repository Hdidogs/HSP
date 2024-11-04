<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ref_evenement' => 'required|exists:evenements,id',
        ]);

        Organisation::create([
            'ref_user' => Auth::id(),
            'ref_evenement' => $request->input('ref_evenement'),
        ]);

        return redirect()->route('evenement.index')->with('status', 'Organisation créée avec succès !');
    }

    public function destroy(Organisation $organisation)
    {
        $organisation->delete();
        return redirect()->route('evenement.index')->with('status', 'Organisation supprimée avec succès !');
    }

}
