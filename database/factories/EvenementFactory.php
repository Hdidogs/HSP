<?php

namespace Database\Factories;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Conférence', 'Séminaire', 'Atelier', 'Webinaire', 'Formation']),
            'titre' => $this->faker->randomElement([
                'Les tendances de l\'intelligence artificielle en 2025',
                'Optimiser votre marketing digital pour 2025',
                'Créez votre site web en une journée avec WordPress',
                'Atelier de programmation Python pour débutants',
                'Séminaire sur la gestion de projet agile',
                'Webinaire : Comment réussir votre lancement produit',
                'Formation complète sur le développement mobile',
                'Conférence sur la cybersécurité et la protection des données'
            ]),
            'description' => $this->faker->randomElement([
                'Rejoignez-nous pour une conférence passionnante sur les dernières innovations en intelligence artificielle, et découvrez comment cette technologie transforme les industries à l\'échelle mondiale.',
                'Participez à ce séminaire interactif pour apprendre à perfectionner vos stratégies de marketing digital, avec un focus particulier sur l\'optimisation pour les moteurs de recherche (SEO) et les publicités en ligne.',
                'Apprenez à créer votre propre site web à l\'aide de WordPress. Ce workshop pratique vous guidera à travers chaque étape, de l\'installation à la mise en ligne.',
                'Apprenez à coder en Python lors de cet atelier pratique conçu pour les débutants, avec des exercices pour bien maîtriser les bases du langage.',
                'Ce séminaire vous aidera à comprendre la méthodologie agile et comment l\'appliquer efficacement dans vos projets pour maximiser la productivité et la collaboration.',
                'Participez à ce webinaire pour découvrir les meilleures stratégies pour un lancement produit réussi, en mettant l\'accent sur la préparation, le marketing et la gestion post-lancement.',
                'Une formation pratique et complète sur le développement d\'applications mobiles, abordant les plateformes Android et iOS avec des outils modernes.',
                'Cette conférence vous apprendra comment renforcer la sécurité de vos systèmes, protéger vos données et vous préparer aux défis de la cybersécurité.'
            ]),
            'date' => $this->faker->dateTimeBetween('now', '+6 months'), // Génère des dates futures réalistes
            'adresse' => $this->faker->address,
            'elementrequis' => $this->faker->randomElement(['Ordinateur portable', 'Bloc-notes', 'Connexion Internet', 'Calculatrice']),
            'nb_place' => $this->faker->numberBetween(20, 500), // Nombre de places entre 20 et 500
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
