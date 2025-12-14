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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            //$table->string('profession')->nullable();
            $table->string('adresse');
            $table->enum('sexe', ['homme', 'femme']);
            $table->string('email')->nullable()->unique();
           // $table->date('date_naissance')->nullable();
           // $table->string('photo')->nullable();
            $table->date('date_venue');
              $table->unsignedBigInteger('user_id');
              $table->timestamps();

    // Définir la relation
    /*$table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade'); // si le client est supprimé, supprimer ses mesures
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
