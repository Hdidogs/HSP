<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evenement;

class EvenementSeeder extends Seeder
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

        // Vider la table 'evenements' (tronquer la table)
        Evenement::truncate();

        // Créer de nouveaux événements logiques (en utilisant la factory)
        Evenement::factory(50)->create();

        // Réactiver la vérification des clés étrangères
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
