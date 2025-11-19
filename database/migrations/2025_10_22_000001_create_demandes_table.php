<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fonctionnaire_id')->nullable();
            $table->string('ppr')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin')->nullable();
            $table->unsignedBigInteger('nom_formation_sanitaire_id')->nullable();
            $table->string('type_demande'); // 'conge', 'attestation', 'autre'
            $table->json('data')->nullable(); // additional fields e.g. conge duration, dates
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->integer('approval_level')->default(0); // 0..3
            $table->unsignedBigInteger('decision_id')->nullable(); // link to created decision record
            $table->timestamps();

            $table->foreign('fonctionnaire_id')->references('id')->on('fonctionnaires')->onDelete('set null');
            $table->foreign('nom_formation_sanitaire_id')->references('id')->on('nom_formation_sanitaires')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};
