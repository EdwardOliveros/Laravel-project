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
        Schema::create('mobiliarios', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_habitacion')->constrained('habitaciones'); // Llave foránea
            $table->foreignId('id_cama')->constrained('camas'); // Llave foránea
            $table->integer('stock');
            // Puedes agregar más campos según las necesidades de tu aplicación
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiliarios');
    }
};
