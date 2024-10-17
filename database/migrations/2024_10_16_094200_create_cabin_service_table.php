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
        Schema::create('cabin_service', function (Blueprint $table) {
            $table->id('id_cabin_service');          // Primary key

            // Clave foránea a la tabla 'cabanas'
            $table->foreignId('id')
                  ->constrained('cabin') // Nombre de la tabla relacionada
                  ->onDelete('cascade');    // Comportamiento al eliminar

            // Clave foránea a la tabla 'servicios'
            $table->foreignId('id_servicio')
                  ->constrained('service') // Nombre de la tabla relacionada
                  ->onDelete('cascade');      // Comportamiento al eliminar

            $table->timestamps(); // Para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_service');
    }
};