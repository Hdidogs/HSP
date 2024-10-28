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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->bigInteger('ref_user');
            $table->bigInteger('ref_evenement');

            $table->timestamps();

            $table->foreign('ref_user')->references('id')->on('users');
            $table->foreign('ref_evenement')->references('id')->on('evenements');

            $table->primary(['ref_user', 'ref_evenement']);
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
