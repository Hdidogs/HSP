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
        Schema::create('replies', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_message');
            $table->unsignedBigInteger('ref_reply');
            $table->timestamps();
            $table->foreign('ref_message')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('ref_reply')->references('id')->on('messages')->onDelete('cascade');

            $table->primary(['ref_message', 'ref_reply']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
