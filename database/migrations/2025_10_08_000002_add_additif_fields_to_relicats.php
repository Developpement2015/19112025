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
        Schema::table('relicats', function (Blueprint $table) {
            $table->integer('annee')->nullable()->after('date_conge')->comment('Année du reliquat/additif');
            $table->boolean('is_additif')->default(false)->after('annee');
            $table->string('document')->nullable()->after('is_additif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('relicats', function (Blueprint $table) {
            $table->dropColumn(['annee', 'is_additif', 'document']);
        });
    }
};
