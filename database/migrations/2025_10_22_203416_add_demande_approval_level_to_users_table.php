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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('demande_approval_level')->nullable()->after('email');
            // Niveau 1, 2 ou 3 pour l'approbation des demandes
            // NULL = pas de niveau assigné (ne peut pas approuver)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('demande_approval_level');
        });
    }
};
