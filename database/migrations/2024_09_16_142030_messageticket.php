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
        Schema::create('messagesticket', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('ref_user')->constrained('users');
            $table->foreignId('ref_ticket')->constrained('tickets');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
