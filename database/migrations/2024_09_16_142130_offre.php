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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->text('mission');
            $table->float('salaire')->nullable();
            $table->foreignId('ref_user')->constrained('users');
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
