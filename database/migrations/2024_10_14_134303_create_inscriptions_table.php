<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ref_evenement')->constrained('evenements')->onDelete('cascade');
            $table->foreignId('ref_user')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['ref_evenement', 'ref_user']); // Contrainte d'unicité
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}