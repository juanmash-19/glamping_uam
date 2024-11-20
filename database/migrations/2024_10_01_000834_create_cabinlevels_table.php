<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cabin_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Columna para el nombre
            $table->text('description')->nullable(); // Columna para la descripción
            $table->string('color', 7); // Columna para el color en hexadecimal
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_levels');
    }
};