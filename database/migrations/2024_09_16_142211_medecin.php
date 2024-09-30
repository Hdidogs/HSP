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
            $table->unsignedBigInteger('ref_user')->primary();
            $table->foreignId('ref_specialite')->constrained('specialites');
            $table->foreignId('ref_hopital')->constrained('hopitaux');
            $table->foreignId('ref_etablissement')->constrained('etablissements');
            $table->timestamps();

            $table->foreign('ref_user')->references('id')->on('users');
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
