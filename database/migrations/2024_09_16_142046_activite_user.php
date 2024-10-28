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
        Schema::create('activite_user', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_user'); // Ensure this matches the data type of 'id' in 'users' table
            $table->unsignedBigInteger('ref_activite');

            $table->timestamps();

            $table->foreign('ref_user')->references('id')->on('users');
            $table->foreign('ref_activite')->references('id')->on('activites');

            $table->primary(['ref_user', 'ref_activite']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activite_user');
    }
};
