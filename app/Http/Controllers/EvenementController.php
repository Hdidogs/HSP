<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\EvenementAvant;

class EvenementController extends Controller
{
    // Affiche la liste des événements à venir
    public function index()
    {
        $userId = Auth::id();

        // Récupère les événements dont la date est postérieure à hier
        $evenements = Evenement::where('date', '>', Carbon::now()->subDay())->get();

        foreach ($evenements as $evenement) {
            $evenement->isCreator = $evenement->isUserCreator($userId);
        }

        return view('evenement.index', compact('evenements'));
    }

    // Affiche le formulaire de création d'un événement
    public function create()
    {
        return view('evenement.create');
    }

    // Enregistre un nouvel événement
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date|after:now',
            'adresse' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'elementrequis' => 'nullable|string',
            'nb_place' => 'required|integer|min:1',
        ]);

        $evenement = Evenement::create($validatedData);

        // Crée une entrée dans la table Organisation pour lier l'événement à son créateur
        Organisation::create([
            'ref_user' => Auth::id(),
            'ref_evenement' => $evenement->id,
        ]);

        return redirect()->route('evenement.index')->with('status', 'Événement créé avec succès !');
    }

    // Affiche le formulaire d'édition d'un événement
    public function edit(Evenement $evenement)
    {
        return view('evenement.edit', compact('evenement'));
    }

    // Met à jour un événement existant
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

    // Supprime un événement et ses organisations associées
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $evenement = Evenement::findOrFail($id);

            // Supprimer les inscriptions associées
            Inscription::where('ref_evenement', $id)->delete();

            // Supprimer les organisations associées
            Organisation::where('ref_evenement', $id)->delete();

            // Supprimer les evenementavant associés
            EvenementAvant::where('ref_evenement', $id)->delete();

            // Supprimer l'événement
            $evenement->delete();

            DB::commit();

            return redirect()->route('evenement.index')->with('status', 'Événement et données associées supprimés avec succès !');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('evenement.index')->with('error', 'Erreur lors de la suppression de l\'événement : ' . $e->getMessage());
        }
    }
    // Gère l'inscription d'un utilisateur à un événement
    public function inscription(Request $request, Evenement $evenement)
    {
        return DB::transaction(function () use ($evenement) {
            // Vérifie si l'utilisateur est déjà inscrit
            $inscriptionExistante = Inscription::where('ref_evenement', $evenement->id)
                ->where('ref_user', auth()->id())
                ->first();

            if ($inscriptionExistante) {
                return redirect()->route('evenement.index')->with('error', 'Vous êtes déjà inscrit à cet événement.');
            }

            // Vérifie s'il reste des places disponibles
            if ($evenement->nb_place <= 0) {
                return redirect()->route('evenement.index')->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
            }

            // Vérifie si l'événement n'est pas déjà passé
            if ($evenement->date < Carbon::now()) {
                return redirect()->route('evenement.index')->with('error', 'Désolé, cet événement est déjà passé.');
            }

            // Crée l'inscription et décrémente le nombre de places disponibles
            Inscription::create([
                'ref_evenement' => $evenement->id,
                'ref_user' => auth()->id(),
            ]);

            $evenement->decrement('nb_place');

            return redirect()->route('evenement.index')->with('status', 'Vous êtes bien inscrit. Merci !');
        });
    }

    // Gère la désinscription d'un utilisateur à un événement
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
    public function show(Evenement $evenement)
    {
        if (Auth::user() == null) {
            
            return redirect('login');
        }
        return view('evenement.show', compact('evenement'));
    }

    // Affiche la liste des inscrits à un événement
    public function inscrits(Evenement $evenement)
    {
        $inscriptions = $evenement->inscriptions()->with('user')->get();
        return view('evenement.inscrits', compact('evenement', 'inscriptions'));
    }

    public function removeUserFromEvent(Evenement $evenement, $userId)
    {
        if (!$evenement->isUserCreator(auth()->id())) {
            return redirect()->route('evenement.inscrits', $evenement->id)
                ->with('error', 'Vous n\'avez pas la permission de supprimer des inscriptions pour cet événement.');
        }

        $deleted = Inscription::where('ref_evenement', $evenement->id)
            ->where('ref_user', $userId)
            ->delete();

        if ($deleted) {
            $evenement->increment('nb_place');
            $user = User::find($userId);
            $userName = $user ? $user->nom : 'L\'utilisateur';
            return redirect()->route('evenement.inscrits', $evenement->id)
                ->with('status', "{$userName} a bien été supprimé de l'événement \"{$evenement->titre}\".");
        } else {
            return redirect()->route('evenement.inscrits', $evenement->id)
                ->with('error', 'Cet utilisateur n\'est pas inscrit à cet événement.');
        }
    }

}
