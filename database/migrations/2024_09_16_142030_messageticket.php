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
<<<<<<< HEAD
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('objet');
            $table->text('description');
            $table->foreignId('ref_user')->constrained('users');
            $table->foreignId('ref_importance')->constrained('importances');
            $table->foreignId('ref_gestionnaire')->nullable()->constrained('users');
            $table->date('date');
=======
        Schema::create('messagesticket', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('ref_user')->constrained('users');
            $table->foreignId('ref_ticket')->constrained('tickets');
>>>>>>> 40742a4ab6d0ac722683587150a7ae4b8d0c6b56
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        //
=======
        Schema::dropIfExists('tickets');
>>>>>>> 40742a4ab6d0ac722683587150a7ae4b8d0c6b56
    }
};
