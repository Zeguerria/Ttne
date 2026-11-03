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
        Schema::create('membre_groupes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('groupe_id')
                ->constrained('groupes')
                ->cascadeOnDelete();

            $table->foreignId('utilisateur_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('role_groupe_id')
                ->constrained('role_groupes')
                ->restrictOnDelete();

            $table->foreignId('statut_id')
                ->constrained('parametres')
                ->restrictOnDelete();

            $table->unsignedInteger('position')->nullable();

            // MONTANT EN FCFA
            $table->unsignedBigInteger('montant_depot')->default(0);

            // DATES
            $table->timestamp('date_demande')->useCurrent();
            $table->timestamp('date_validation')->nullable();

            // VALIDATEUR
            $table->foreignId('valider_par')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // SUPPRESSION LOGIQUE
            $table->boolean('supprimer')->default(0);

            $table->timestamps();

            // UN UTILISATEUR PAR GROUPE
            $table->unique(
                ['groupe_id', 'utilisateur_id'],
                        'unique_groupe_utilisateur'
            );

            // INDEX
            $table->index('statut_id');
            $table->index('role_groupe_id');
            $table->index('position');
            $table->index('supprimer');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_groupes');
    }
};
