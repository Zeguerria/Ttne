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
        Schema::create('parametres', function (Blueprint $table) {
           $table->id(); // PK
            $table->string('code', 200);
            $table->string('libelle', 300);
            $table->unsignedBigInteger('type_parametre_id');
            $table->foreign('type_parametre_id')->references('id')->on('type_parametres')->onDelete('cascade'); // si on supprime le type, les valeurs suivent
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('supprimer')->default(0);
            $table->timestamps();
            // contrainte : un code doit être unique dans un type donné
            $table->unique(['code', 'type_parametre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
