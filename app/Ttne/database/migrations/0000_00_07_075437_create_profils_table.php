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
       Schema::create('profils', function (Blueprint $table) {

            $table->id();

            // Informations
            $table->string('code', 100)->unique();
            $table->string('libelle', 300);
            $table->text('description')->nullable();

            // Validation des comptes
            $table->boolean('est_validateur')
                ->default(false)
                ->comment('Peut valider ou rejeter les demandes d\'inscription');

            // État
            $table->boolean('is_active')->default(true);

            // Corbeille logique
            $table->boolean('supprimer')->default(false);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
