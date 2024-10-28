<?php

namespace App\Http\Controllers;

use App\Models\ActiviteAvant;
use App\Models\EvenementAvant;
use App\Models\OffreAvant;

class AccueilController
{
    public function index()
    {
        $events = EvenementAvant::all();
        $news = ActiviteAvant::all();
        $offers = OffreAvant::all();

        return view('dashboard', compact('offers', 'news', 'events'));
    }
}
