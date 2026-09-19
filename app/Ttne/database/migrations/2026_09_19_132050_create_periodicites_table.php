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
        Schema::create('periodicites', function (Blueprint $table) {
            $table->id();
             // Nom affiché : Mensuelle, Hebdomadaire, etc.
            $table->string('nom');

            // Code interne : MENSUELLE, HEBDOMADAIRE, etc.
            $table->string('code')->unique();

            // Unité : jour, semaine, mois, année...
            $table->string('unite');

            // Valeur correspondant à l'unité
            // Exemple : 1 mois, 2 semaines, 30 jours
            $table->unsignedInteger('valeur');

            // Description facultative
            $table->text('description')->nullable();

            // Activation de la périodicité
            $table->boolean('active')->default(true);

            // Corbeille
            $table->boolean('supprimer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodicites');
    }
};
