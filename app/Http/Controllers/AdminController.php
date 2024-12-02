<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function show($id)
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function cancelValidation($id)
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        $user = User::findOrFail($id);
        // Logique pour annuler la validation
        // Par exemple : $user->validated = false; $user->save();

        return redirect()->back()->with('success', 'Validation annulée avec succès.');
    }

    public function destroy($id)
    {
        if (!auth()->check() || !auth()->user()->estAdmin()) {
            abort(403, 'Accès non autorisé.');
        }

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            // Liste des relations à supprimer ou détacher
            $relationsToDelete = [
                'activiteavants',
                'caches',
                'cacheLocks',
                'entreprises',
                'etablissements',
                'etudiant',
                'evenementavants',
                'evenements',
                'forums',
                'gestionnaire',
                'hopitaux',
                'importances',
                'inscriptions',
                'medecin',
                'messages',
                'offreavants',
                'organisations',
                'partenaires',
                'replies',
                'specialites',
                'tickets'
            ];

            $relationsToDetach = ['activites', 'offres', 'roles'];

            // Supprimer les relations
            foreach ($relationsToDelete as $relation) {
                if (method_exists($user, $relation)) {
                    $user->$relation()->delete();
                }
            }

            // Détacher les relations many-to-many
            foreach ($relationsToDetach as $relation) {
                if (method_exists($user, $relation)) {
                    $user->$relation()->detach();
                }
            }

            // Supprimer les jetons d'accès personnels
            if (method_exists($user, 'tokens')) {
                $user->tokens()->delete();
            }

            // Supprimer l'utilisateur
            $user->delete();

            DB::commit();

            Log::info("Utilisateur et toutes ses relations supprimés avec succès", ['user_id' => $id]);

            return redirect()->route('admin.index')->with('success', 'Utilisateur et toutes ses données associées supprimés avec succès');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erreur lors de la suppression de l'utilisateur et de ses relations", ['user_id' => $id, 'error' => $e->getMessage()]);
            return redirect()->route('admin.index')->with('error', 'Une erreur est survenue lors de la suppression de l\'utilisateur et de ses données associées');
        }
    }
}