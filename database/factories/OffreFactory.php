<?php

namespace Database\Factories;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    protected $model = Offre::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->jobTitle,  // Génère un titre d'offre comme "Développeur Backend"
            'description' => $this->faker->paragraph,  // Une description réaliste
            'mission' => $this->faker->paragraph,  // Une mission générée
            'closed' => $this->faker->boolean,  // Statut de l'offre : ouvert ou fermé
            'salaire' => $this->faker->randomFloat(2, 2000, 10000),  // Un salaire entre 2000 et 10000
            'ref_user' => User::inRandomOrder()->first()->id,  // Lier à un utilisateur existant de manière aléatoire
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
