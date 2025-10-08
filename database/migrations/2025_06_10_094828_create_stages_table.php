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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->string('cin');
            $table->text('institut_details');
            $table->integer('duree'); // durée en jours
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('hierarchie');
            $table->text('avis')->nullable();
            $table->enum('statut_attestation', ['traité', 'pas en cours', 'en cours'])->default('en cours');
            $table->enum('cadre', ['médical', 'administratif']);
            $table->enum('type_stage', ['volontaire', 'formation']);

            // Clés étrangères
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            $table->foreignId('option_id')->constrained('options')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('formation_sanitaire_id')->constrained('nom_formation_sanitaires')->onDelete('cascade');
            $table->foreignId('encadrant_id')->constrained('encadrants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
