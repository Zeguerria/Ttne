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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            // Informations personnelles
            $table->string('name');
            $table->string('prenom');
            $table->string('slug')->unique();

            // Profil
            $table->foreignId('profil_id')
                ->constrained('profils')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Statut du compte
            $table->foreignId('statut_compte_id')
                ->constrained('parametres')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Contact
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Authentification
            $table->string('password');

            // Informations complémentaires
            $table->date('date_naissance')->nullable();

            // Photo de profil
            $table->string('photo', 2048)->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            // Dernière connexion
            $table->timestamp('derniere_connexion')->nullable();

            // Dernière adresse IP
            $table->string('derniere_ip')->nullable();

            // Corbeille logique
            $table->boolean('supprimer')->default(false);

            // Jetstream
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();

            $table->timestamps();

        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
