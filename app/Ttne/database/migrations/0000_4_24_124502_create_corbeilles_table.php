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
        Schema::create('corbeilles', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('element_id');

            $table->string('table_name');

            $table->string('slug')->nullable();

            $table->string('type')->nullable();

            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('deleted_at')->nullable();

            $table->boolean('deleted_forever')->default(false);

            $table->json('data_snapshot')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corbeilles');
    }
};
