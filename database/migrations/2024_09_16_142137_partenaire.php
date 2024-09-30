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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_user')->primary();
            $table->string('poste');
            $table->foreignId('ref_entreprise')->constrained('entreprises');
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
