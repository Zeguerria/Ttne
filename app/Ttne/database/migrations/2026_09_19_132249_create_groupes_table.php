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
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            /*
                |--------------------------------------------------------------------------
                | INFORMATIONS DU GROUPE
                |--------------------------------------------------------------------------
            */

            $table->string('nom');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            /*
                |--------------------------------------------------------------------------
                | CRÉATEUR
                |--------------------------------------------------------------------------
                |
                | Utilisateur ayant créé le groupe.
                |
            */

            $table->foreignId('createur_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();


            /*
            |--------------------------------------------------------------------------
            | COTISATION
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('montant_cotisation')
                ->default(0);

            $table->decimal('penalite_pourcentage', 5, 2)
                ->default(0);

            $table->decimal('fonds_assurance_pourcentage', 5, 2)
                ->default(0);

            $table->unsignedInteger('delai_grace_heures')
                ->default(0);


            /*
            |--------------------------------------------------------------------------
            | PARTICIPANTS
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('nombre_participants_max');


            /*
            |--------------------------------------------------------------------------
            | PÉRIODICITÉ
            |--------------------------------------------------------------------------
            |
            | Exemple : quotidien, hebdomadaire, mensuel...
            |
            | Table : periodicites
            |
            */

            $table->foreignId('periodicite_id')
                ->constrained('periodicites')
                ->cascadeOnUpdate()
                ->restrictOnDelete();


            /*
            |--------------------------------------------------------------------------
            | DATES
            |--------------------------------------------------------------------------
            */

            $table->date('date_debut');

            $table->date('date_fin_estimee')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | PARAMÈTRES
            |--------------------------------------------------------------------------
            |
            | mode_distribution_id
            | validation_membre_id
            | visibilite_id
            | statut_id
            |
            | Ces valeurs proviennent de la table parametres.
            |
            */

            $table->foreignId('mode_distribution_id')
                ->constrained('parametres')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('validation_membre_id')
                ->constrained('parametres')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('visibilite_id')
                ->constrained('parametres')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('statut_id')
                ->constrained('parametres')
                ->cascadeOnUpdate()
                ->restrictOnDelete();


            /*
            |--------------------------------------------------------------------------
            | CORBEILLE
            |--------------------------------------------------------------------------
            */

            $table->boolean('supprimer')
                ->default(false);


            /*
            |--------------------------------------------------------------------------
            | TIMESTAMPS
            |--------------------------------------------------------------------------
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupes');
    }
};
