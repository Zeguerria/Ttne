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
        Schema::create('pieces', function (Blueprint $table) {

        $table->id();

        // Utilisateur propriétaire
        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

    // Type de pièce (CNI, Passeport, Permis...)
    $table->foreignId('type_piece_id')
        ->constrained('parametres')
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    // Numéro de la pièce
    $table->string('numero')->nullable();

    // Document (image ou PDF)
    $table->string('fichier');

    // Type MIME
    $table->string('mime_type')->nullable();

    // Date d'expiration
    $table->date('date_expiration')->nullable();

    // Statut de la pièce (En attente, Validée, Refusée...)
    $table->foreignId('statut_piece_id')
        ->constrained('parametres')
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    // Observation de l'administrateur
    $table->text('commentaire')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces');
    }
};
