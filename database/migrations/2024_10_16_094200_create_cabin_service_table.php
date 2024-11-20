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
            $table->id('id_cabin_service'); // Clave primaria
            $table->foreignId('id_cabin')->constrained('cabins')->onDelete('cascade');
            $table->foreignId('id_servicio')->constrained('services', 'id_servicio')->onDelete('cascade');
            $table->timestamps();
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