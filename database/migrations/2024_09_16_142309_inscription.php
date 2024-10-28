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
            $table->unsignedBigInteger('ref_user'); // Ensure this matches the data type of 'id' in 'users' table
            $table->unsignedBigInteger('ref_evenement'); // Ensure this matches the data type of 'id' in 'evenements' table
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
        Schema::dropIfExists('inscriptions');
    }
};
