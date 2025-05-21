<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('ville')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->unique();
            $table->string('photo')->nullable(); // chemin vers la photo
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // l’auteur qui a ajouté
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beneficiaires');
    }
}
