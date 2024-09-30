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
        Schema::create('offre_user', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_user');
            $table->unsignedBigInteger('ref_offre');
            $table->timestamps();

            $table->foreign('ref_user')->references('id')->on('users');
            $table->foreign('ref_offre')->references('id')->on('offres');

            $table->primary(['ref_user', 'ref_offre']);
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
