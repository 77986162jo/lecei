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
        $table->decimal('montant', 10, 2)->nullable()->after('beneficiaire_id');
    });
}

public function down(): void
{
    Schema::table('aides', function (Blueprint $table) {
        $table->dropColumn('montant');
    });
}


};
