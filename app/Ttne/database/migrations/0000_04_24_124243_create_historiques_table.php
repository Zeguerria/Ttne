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

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->nullableMorphs('record');

            $table->string('record_name')->nullable();

            $table->string('action');

            $table->boolean('statut')->default(false);

            $table->boolean('supprimer')->default(false);

            $table->json('ancienne_valeur')->nullable();

            $table->json('nouvelle_valeur')->nullable();

            // snapshot complet
            $table->json('record_snapshot')->nullable();

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
