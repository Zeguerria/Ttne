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
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();

            // utilisateur
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // polymorphique (clé magique Laravel)
            $table->nullableMorphs('record');

            // infos lisibles
            $table->string('record_name')->nullable();
            $table->string('action');

            // états
            $table->boolean('statut')->default(false); // non lu / lu
            $table->boolean('supprimer')->default(false);

            // données
            $table->json('ancienne_valeur')->nullable();
            $table->json('nouvelle_valeur')->nullable();

            // sécurité
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
