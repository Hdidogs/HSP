<?php

namespace Database\Seeders;

use App\Models\Activite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Désactiver temporairement les vérifications de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Supprimer toutes les anciennes données de la table 'activites'
        Activite::truncate();

        // Créer les nouvelles données
        \App\Models\Activite::factory(50)->create();

        // Réactiver les vérifications de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
