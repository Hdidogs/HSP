<?php

namespace Database\Seeders;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Désactiver la vérification des clés étrangères
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Supprimer les anciennes données de la table 'offres' (si nécessaire)
        Offre::truncate();

        // Utiliser des utilisateurs spécifiques pour lier les offres
        $users = User::all();  // Récupère tous les utilisateurs existants

        // Créer des offres logiques pour différents types de missions
        foreach ($users as $user) {
            Offre::create([
                'titre' => "Développeur PHP - $user->nom",
                'description' => 'Nous recherchons un développeur PHP expérimenté pour rejoindre notre équipe.',
                'mission' => 'Vous serez responsable du développement et de la maintenance des applications web en PHP.',
                'closed' => false,
                'salaire' => 3500,  // Salaire fixe pour l'exemple
                'ref_user' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Offre::create([
                'titre' => "Chef de projet - $user->nom",
                'description' => 'Rejoignez notre équipe en tant que chef de projet pour coordonner nos projets de grande envergure.',
                'mission' => 'Vous serez chargé de superviser l’ensemble du projet, de la planification à l’implémentation.',
                'closed' => false,
                'salaire' => 5500,  // Salaire plus élevé pour un chef de projet
                'ref_user' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Offre::create([
                'titre' => "Community Manager - $user->nom",
                'description' => 'Nous cherchons un community manager créatif pour gérer nos réseaux sociaux.',
                'mission' => 'Vous serez responsable de la gestion de nos profils sur les réseaux sociaux et de l’animation des communautés.',
                'closed' => true,  // Offres fermées
                'salaire' => 2500,
                'ref_user' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
