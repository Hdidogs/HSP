<?php

namespace Database\Factories;

use App\Models\Activite;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActiviteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activite::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tableau d'activités logiques
        $activites = [
            [
                'titre' => 'Formation interne : Développement Agile',
                'desc' => 'Une formation intensive sur les méthodologies Agile, Scrum et Kanban pour améliorer notre gestion de projets.',
                'date' => $this->faker->dateTimeBetween('now', '+1 month'), // Date dans le mois suivant
                'nb_place' => 20, // 20 places disponibles
            ],
            [
                'titre' => 'Réunion d\'équipe : Planification du trimestre',
                'desc' => 'Réunion stratégique pour définir les objectifs du trimestre et aligner les équipes.',
                'date' => $this->faker->dateTimeBetween('now', '+1 week'), // Date dans la semaine suivante
                'nb_place' => 10, // 10 places pour les membres de l\'équipe
            ],
            [
                'titre' => 'Webinaire : Introduction à la Data Science',
                'desc' => 'Un webinaire en ligne pour explorer les bases de la Data Science et son impact sur les entreprises.',
                'date' => $this->faker->dateTimeBetween('now', '+2 weeks'), // Date dans deux semaines
                'nb_place' => 100, // Webinaire accessible à 100 participants
            ],
            [
                'titre' => 'Atelier de développement personnel',
                'desc' => 'Atelier interactif pour aider les collaborateurs à améliorer leurs compétences en gestion du stress et en communication.',
                'date' => $this->faker->dateTimeBetween('now', '+1 month'),
                'nb_place' => 15,
            ],
            [
                'titre' => 'Séminaire sur la sécurité informatique',
                'desc' => 'Un séminaire pour sensibiliser les employés aux risques en ligne et leur apprendre à sécuriser leurs données.',
                'date' => $this->faker->dateTimeBetween('now', '+3 weeks'),
                'nb_place' => 30,
            ],
            [
                'titre' => 'Lancement de produit : Application mobile',
                'desc' => 'Un événement pour annoncer le lancement de notre nouvelle application mobile pour la gestion des tâches.',
                'date' => $this->faker->dateTimeBetween('now', '+2 months'),
                'nb_place' => 50,
            ],
            [
                'titre' => 'Concours de programmation : Développement de chatbot',
                'desc' => 'Concours où les développeurs s’affrontent pour créer le chatbot le plus performant et original.',
                'date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
                'nb_place' => 10,
            ],
            [
                'titre' => 'Conférence : La transformation digitale en entreprise',
                'desc' => 'Une conférence pour discuter de la transformation numérique et de ses implications dans le monde des affaires.',
                'date' => $this->faker->dateTimeBetween('now', '+1 month'),
                'nb_place' => 200,
            ],
            [
                'titre' => 'Séance de brainstorming : Innovation produit',
                'desc' => 'Séance de brainstorming pour générer des idées nouvelles pour notre prochain produit innovant.',
                'date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
                'nb_place' => 12,
            ],
            [
                'titre' => 'Team building : Escape game',
                'desc' => 'Activité de cohésion d\'équipe sous forme d\'escape game pour renforcer les liens entre collègues.',
                'date' => $this->faker->dateTimeBetween('now', '+1 week'),
                'nb_place' => 20,
            ],
        ];

        // Retourner une activité logique avec un utilisateur aléatoire pour 'ref_user'
        $activite = $activites[array_rand($activites)]; // Choisir une activité au hasard

        return [
            'titre' => $activite['titre'],
            'desc' => $activite['desc'],
            'date' => $activite['date'],
            'nb_place' => $activite['nb_place'],
            'ref_user' => User::inRandomOrder()->first()->id, // Assurez-vous que l'utilisateur existe
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
