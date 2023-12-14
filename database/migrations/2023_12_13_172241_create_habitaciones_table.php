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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('numero');
            $table->foreignId('id_estado')->constrained('estado_habitaciones'); // Llave foránea
            $table->foreignId('id_tipo')->constrained('tipo_habitaciones'); // Llave foránea
            $table->decimal('tarifa', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->integer('capacidad');
            $table->string('imagen')->nullable(); // Varchar para la ruta de la imagen, nullable por si no hay una imagen
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
