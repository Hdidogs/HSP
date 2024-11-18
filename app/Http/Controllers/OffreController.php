<?php

namespace App\Http\Controllers;

use App\Mail\CandidatureMail;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OffreController extends Controller
{
    // Affiche la liste de toutes les offres
    public function index()
    {
        $offres = Offre::latest()->get();
        $meilleuresOffres = Offre::where('closed', false)
            ->latest()
            ->take(3)
            ->get();
        return view('offre.index', compact('offres', 'meilleuresOffres'));
    }

    // Affiche le formulaire de création d'une offre
    public function create()
    {
        return view('offre.create');
    }

    // Enregistre une nouvelle offre
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $validatedData['ref_user'] = Auth::id();

        Offre::create($validatedData);

        return redirect()->route('offre.index');
    }

    // Affiche les détails d'une offre spécifique
    public function show(Offre $offre)
    {
        return view('offre.show', compact('offre'));
    }

    // Affiche le formulaire d'édition d'une offre
    public function edit(Offre $offre)
    {
        return view('offre.edit', compact('offre'));
    }

    // Met à jour une offre existante
    public function update(Request $request, Offre $offre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'salaire' => 'nullable|numeric',
        ]);

        $offre->update($validatedData);

        return redirect()->route('offre.index');
    }

    // Supprime une offre
    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offre.index');
    }

    // Clôture ou réouvre une offre
    public function cloturer(Request $request, Offre $offre)
    {
        $offre->closed = $request->input('closed', 0);
        $offre->save();

        return response()->json(['success' => true, 'closed' => $offre->closed]);
    }

    // Traite la candidature à une offre
    public function postuler(Request $request, Offre $offre)
    {
        $request->validate([
            'message' => 'nullable|string|max:3000',
        ]);

        $contenue = $request->input('message');
        $user = Auth::user();

        $userCreateur = User::find($offre->ref_user);
        if (!$userCreateur) {
            return redirect()->back()->withErrors('Impossible de trouver le créateur de l\'offre');
        }

        $mailCreateur = $userCreateur->email;

        Mail::to($mailCreateur)->send(new CandidatureMail($user, $contenue, $offre));

        return redirect()->route('offre.show', $offre);
    }

    // Affiche le formulaire pour postuler à une offre
    public function showPostulerForm(Offre $offre)
    {
        return view('offre.postuler', compact('offre'));
    }
}