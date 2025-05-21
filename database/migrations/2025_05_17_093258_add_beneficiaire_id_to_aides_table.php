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
    Schema::table('aides', function (Blueprint $table) {
        $table->foreignId('beneficiaire_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('aides', function (Blueprint $table) {
        $table->dropForeign(['beneficiaire_id']);
        $table->dropColumn('beneficiaire_id');
    });
}

};
