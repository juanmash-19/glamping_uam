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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reserva');           // Primary Key
            $table->timestamp('fecha_reserva'); // Fecha de reserva
            $table->date('fecha_inicio');       // Fecha de inicio
            $table->date('fecha_fin');          // Fecha de fin

            // Clave foránea a la tabla 'cabin'
            $table->foreignId('cabin_id')       // Nombre correcto de la clave foránea
                ->constrained('cabins')         // Tabla relacionada (nota: es 'cabins', no 'cabin')
                ->onDelete('cascade');

            // Clave foránea a la tabla 'users'
            $table->foreignId('user_id')        // Nombre correcto de la clave foránea
                ->constrained('users')          // Tabla relacionada
                ->onDelete('cascade');

            $table->timestamps();               // created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};