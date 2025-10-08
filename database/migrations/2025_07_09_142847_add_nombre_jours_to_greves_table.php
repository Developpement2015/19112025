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
        Schema::table('greves', function (Blueprint $table) {
            $table->integer('nombre_jours')->nullable()->after('date_fin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('greves', function (Blueprint $table) {
            $table->dropColumn('nombre_jours');
        });
    }
};
