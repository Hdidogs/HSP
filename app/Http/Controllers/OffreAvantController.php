<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\EvenementAvant;
use Illuminate\Http\Request;

class OffreAvantController extends Controller
{
    public function dashboard()
    {
        $meilleuresOffres = Offre::where('closed', false)
            ->latest()
            ->take(3)
            ->get();

        $evenementAvants = EvenementAvant::with('evenement')
            ->whereHas('evenement', function ($query) {
                $query->where('date', '>=', now());
            })
            ->take(3)
            ->get();

        return view('dashboard', compact('meilleuresOffres', 'evenementAvants'));
    }
}