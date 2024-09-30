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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('objet');
            $table->text('description');
            $table->foreignId('ref_user')->constrained('users');
            $table->foreignId('ref_importance')->constrained('importances');
            $table->foreignId('ref_gestionnaire')->constrained('users');
            $table->date('date');
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
