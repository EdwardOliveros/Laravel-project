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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_cliente')->constrained('clientes'); // Llave foránea
            $table->date('fecha_factura');
            $table->decimal('porcent_impuesto', 5, 2); // Decimal con 5 dígitos en total y 2 dígitos después del punto decimal
            $table->decimal('descuento', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->decimal('total', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->foreignId('id_reserva')->constrained('reservas'); // Llave foránea
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
