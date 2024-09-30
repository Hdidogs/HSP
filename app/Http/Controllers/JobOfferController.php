<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = [
            ['title' => 'Développeur Full Stack HSP', 'company' => 'TechCare Solutions', 'description' => 'Nous recherchons un développeur full stack sensible et empathique pour rejoindre notre équipe bienveillante...'],
            // Ajoutez d'autres offres d'emploi ici
        ];

        return view('joboffers.index', compact('jobOffers'));
    }
}