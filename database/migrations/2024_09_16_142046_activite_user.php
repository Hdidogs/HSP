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
            $table->bigInteger('ref_user');
            $table->bigInteger('ref_activite');

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
        //
    }
};
