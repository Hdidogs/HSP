<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Evenement;
use App\Models\Offre;

class AccueilController
{
    public function index()
    {
        $evenements = Evenement::all();
        $activites = Activite::all();
        $offres = Offre::all();

        return view('dashboard', compact('offres', 'activites', 'evenements'));
    }
}
