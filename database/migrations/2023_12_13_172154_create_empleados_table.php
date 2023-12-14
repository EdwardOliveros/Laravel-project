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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_usuario')->constrained('usuarios'); // Llave foránea
            $table->string('cargo');
            $table->string('direccion_residencia');
            $table->decimal('ingreso_basico', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            $table->date('fecha_ingreso');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
