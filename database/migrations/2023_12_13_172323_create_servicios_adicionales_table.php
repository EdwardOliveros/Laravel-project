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
        Schema::create('servicios_adicionales', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_tipo_servicio')->constrained('tipo_servicios'); // Llave foránea
            $table->decimal('valor', 10, 2); // Decimal con 10 dígitos en total y 2 dígitos después del punto decimal
            // Puedes agregar más campos según las necesidades de tu aplicación
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_adicionales');
    }
};
