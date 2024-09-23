<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ref_user')->constrained('users');
            $table->foreignId('ref_specialite')->constrained('specialites');
            $table->foreignId('ref_hopital')->constrained('hopitaux');
            $table->foreignId('ref_etablissement')->constrained('etablissements');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
