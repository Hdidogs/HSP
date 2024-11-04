<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Inscription;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::where('date', '>', Carbon::now()->subDay())->get();
        return view('evenement.index', compact('evenements'));
    }

    public function create()
    {
        return view('evenement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d\TH:i|after:now',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'elementrequis' => 'required|string|max:255',
            'nb_place' => 'required|integer|min:0',
        ]);

        Evenement::create($request->all());

        return redirect()->route('evenement.index')->with('status', 'Événement créé avec succès!');
    }

    public function edit(Evenement $evenement)
    {
        return view('evenement.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d\TH:i|after:now',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'elementrequis' => 'required|string|max:255',
            'nb_place' => 'required|integer|min:0',
        ]);

        $evenement->update($request->all());

        return redirect()->route('evenement.index')->with('status', 'Événement mis à jour avec succès!');
    }

    public function destroy(Evenement $evenement)
    {
        DB::transaction(function () use ($evenement) {
            Inscription::where('ref_evenement', $evenement->id)->delete();
            $evenement->delete();
        });

        return redirect()->route('evenement.index')->with('status', 'Événement et toutes les inscriptions associées supprimés avec succès!');
    }

    public function inscription(Request $request, Evenement $evenement)
    {
        return DB::transaction(function () use ($evenement) {
            $inscriptionExistante = Inscription::where('ref_evenement', $evenement->id)
                ->where('ref_user', auth()->id())
                ->first();

            if ($inscriptionExistante) {
                return redirect()->route('evenement.index')->with('error', 'Vous êtes déjà inscrit à cet événement.');
            }

            if ($evenement->nb_place <= 0) {
                return redirect()->route('evenement.index')->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
            }

            if ($evenement->date < Carbon::now()) {
                return redirect()->route('evenement.index')->with('error', 'Désolé, cet événement est déjà passé.');
            }

            Inscription::create([
                'ref_evenement' => $evenement->id,
                'ref_user' => auth()->id(),
            ]);

            $evenement->decrement('nb_place');

            return redirect()->route('evenement.index')->with('status', 'Vous êtes bien inscrit. Merci !');
        });
    }

    public function desinscription(Request $request, Evenement $evenement)
    {
        return DB::transaction(function () use ($evenement) {
            $deleted = Inscription::where('ref_evenement', $evenement->id)
                ->where('ref_user', auth()->id())
                ->delete();

            if ($deleted) {
                $evenement->increment('nb_place');
                return redirect()->route('evenement.index')->with('status', 'Vous êtes bien désinscrit. Merci !');
            }

            return redirect()->route('evenement.index')->with('error', 'Vous n\'étiez pas inscrit à cet événement.');
        });
    }
}