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
        Schema::create('apprentis', function (Blueprint $table) {
    $table->id();

    // Identité
    $table->string('nom');
    $table->string('prenom');
    $table->enum('sexe', ['Homme', 'Femme'])->nullable();
    $table->date('date_naissance')->nullable();

    // Apprentissage
    $table->date('date_debut_apprentissage')->nullable();
    $table->date('date_fin_apprentissage')->nullable();
    $table->string('duree_formation')->nullable(); // en mois

    // Informations personnelles
    $table->string('adresse')->nullable();
    $table->string('niveau_etude')->nullable();
    $table->string('option')->nullable(); // ex: Couture, Stylisme, Broderie

    // Finances
    $table->decimal('montant_contrat', 10, 2)->default(0);
    $table->decimal('avance_paye', 10, 2)->default(0);
    $table->decimal('reste_a_payer', 10, 2)->default(0);

    // Contact
    $table->string('numero_parent')->nullable();

    // Médias
    $table->string('photo')->nullable();

    // Statut
    $table->boolean('status')->default(true);

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentis');
    }
};
