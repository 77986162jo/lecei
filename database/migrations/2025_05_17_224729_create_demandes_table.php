<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('demandes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // auteur de la demande
        $table->text('contenu'); // contenu ou objet de la demande
        $table->enum('statut', ['en_attente', 'validee', 'rejetee'])->default('en_attente');
        $table->text('motif_rejet')->nullable(); // visible seulement si rejetée
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
