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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_cliente')->constrained('clientes'); // Llave foránea
            $table->date('fecha_reserva');
            $table->integer('cant_habit');
            $table->integer('adultos');
            $table->integer('ninos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('valor', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->foreignId('id_estado')->constrained('estado_reservas'); // Llave foránea
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
