<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = [
            ['title' => 'Les avantages d\'embaucher des HSP en entreprise', 'date' => 'Il y a 2 jours', 'excerpt' => 'Les personnes hautement sensibles apportent une perspective unique et précieuse en milieu professionnel...'],
            // Ajoutez d'autres actualités ici
        ];

        return view('news.index', compact('news'));
    }
}