
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
       Schema::create('aides', function (Blueprint $table) {
    $table->id();
    $table->string('titre');
    $table->text('description')->nullable();
    $table->string('photo')->nullable();
    $table->string('document')->nullable();
    
    $table->unsignedBigInteger('category_id');
    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

    $table->unsignedBigInteger('user_id'); // lier à la personne qui offre l’aide
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

    $table->timestamps();
    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aides');
    }
};