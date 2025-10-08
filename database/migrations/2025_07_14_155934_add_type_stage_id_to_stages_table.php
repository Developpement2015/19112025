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
        Schema::table('stages', function (Blueprint $table) {
            $table->unsignedBigInteger('type_stage_id')->nullable()->after('type_stage');
            $table->foreign('type_stage_id')->references('id')->on('type_stages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->dropForeign(['type_stage_id']);
            $table->dropColumn('type_stage_id');
        });
    }
};
