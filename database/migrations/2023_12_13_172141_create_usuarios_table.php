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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_rol')->constrained('roles'); // Llave foránea
            $table->string('tipo_doc');
            $table->string('num_doc');
            $table->string('nombres');
            $table->string('correo');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('nombre_usuario');
            $table->string('password');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
