<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('aides', function (Blueprint $table) {
            $table->date('date')->nullable()->after('montant');
        });
    }

    public function down(): void
    {
        Schema::table('aides', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};
