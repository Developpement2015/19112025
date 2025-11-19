<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditifFieldsToRelicats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relicats', function (Blueprint $table) {
            if (!Schema::hasColumn('relicats', 'is_additif')) {
                $table->boolean('is_additif')->default(false)->after('date_conge');
            }
            if (!Schema::hasColumn('relicats', 'annee')) {
                $table->unsignedSmallInteger('annee')->nullable()->after('is_additif');
            }
            if (!Schema::hasColumn('relicats', 'document')) {
                $table->string('document')->nullable()->after('annee');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relicats', function (Blueprint $table) {
            if (Schema::hasColumn('relicats', 'document')) {
                $table->dropColumn('document');
            }
            if (Schema::hasColumn('relicats', 'annee')) {
                $table->dropColumn('annee');
            }
            if (Schema::hasColumn('relicats', 'is_additif')) {
                $table->dropColumn('is_additif');
            }
        });
    }
}
