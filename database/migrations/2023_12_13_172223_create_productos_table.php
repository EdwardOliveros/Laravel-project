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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre_producto');
            $table->text('descripcion')->nullable();
            $table->decimal('precio_unitario', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
