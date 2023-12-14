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
        Schema::create('reserva_habitaciones', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_habitacion')->constrained('habitaciones'); // Llave foránea
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_habitaciones');
    }
};
