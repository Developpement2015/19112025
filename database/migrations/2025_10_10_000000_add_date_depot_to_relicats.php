<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('relicats', function (Blueprint $table) {
            if (!Schema::hasColumn('relicats', 'date_depot')) {
                $table->date('date_depot')->nullable()->after('date_conge');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('relicats', function (Blueprint $table) {
            if (Schema::hasColumn('relicats', 'date_depot')) {
                $table->dropColumn('date_depot');
            }
        });
    }
};
