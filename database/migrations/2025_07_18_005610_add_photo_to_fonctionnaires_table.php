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
        Schema::table('fonctionnaires', function (Blueprint $table) {
            // Ajouter le champ photo après le champ sexe
            $table->string('photo')->nullable()->after('sexe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fonctionnaires', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
