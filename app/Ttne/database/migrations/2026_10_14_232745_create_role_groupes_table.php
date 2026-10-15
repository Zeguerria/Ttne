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
        Schema::create('role_groupes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->boolean('supprimer')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_groupes');
    }
};
