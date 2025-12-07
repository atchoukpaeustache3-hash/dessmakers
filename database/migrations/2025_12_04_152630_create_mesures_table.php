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
        Schema::create('mesures', function (Blueprint $table) {
            $table->id();
            $table->float('encolure')->nullable();
            $table->float('tr_poitrine')->nullable();
            $table->float('tr_sous_poitrine')->nullable();
            $table->float('tr_taille')->nullable();
            $table->float('tr_bassin')->nullable();
            $table->float('tr_cuisse')->nullable();
            $table->float('tr_ceinture')->nullable();
            $table->float('tr_bras')->nullable();
            $table->float('tr_manche')->nullable();
            $table->float('tr_bas')->nullable();  
            $table->float('tr_tete')->nullable();    
            $table->float('hr_poitrine')->nullable();
            $table->float('hr_sous_poitrine')->nullable();
            $table->float('lg_epaule')->nullable();
            $table->float('lg_taille')->nullable();
            $table->float('lg_taille_dos')->nullable();
            $table->float('lg_manche')->nullable();
            $table->float('lg_pantalon')->nullable();
            $table->float('lg_genoux')->nullable();
            $table->float('lg_chemise')->nullable();
            $table->float('carrure_devant')->nullable();
            $table->float('carrure_dos')->nullable();
            $table->float('demi_dos')->nullable();
            
              $table->unsignedBigInteger('client_id');

    // Définir la relation
    $table->foreign('client_id')
          ->references('id')
          ->on('clients')
          ->onDelete('cascade'); // si le client est supprimé, supprimer ses mesures
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesures');
    }
};
