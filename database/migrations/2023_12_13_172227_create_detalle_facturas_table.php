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
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_cliente')->constrained('clientes'); // Llave foránea
            $table->foreignId('id_factura')->constrained('facturas'); // Llave foránea
            $table->foreignId('id_servicio')->nullable()->constrained('tipo_servicios'); // Llave foránea, nullable ya que puede estar relacionado con un servicio o un producto
            $table->foreignId('id_producto')->nullable()->constrained('productos'); // Llave foránea, nullable ya que puede estar relacionado con un servicio o un producto
            $table->integer('cantidad');
            $table->decimal('valor', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_facturas');
    }
};
