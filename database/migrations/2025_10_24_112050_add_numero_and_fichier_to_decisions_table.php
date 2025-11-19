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
        Schema::table('decisions', function (Blueprint $table) {
            $table->string('numero_decision')->nullable()->unique()->after('type');
            $table->string('fichier_decision')->nullable()->after('numero_decision');
            $table->text('observations')->nullable()->after('fichier_decision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('decisions', function (Blueprint $table) {
            $table->dropColumn(['numero_decision', 'fichier_decision', 'observations']);
        });
    }
};
