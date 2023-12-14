<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Usuario
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id_usuario', // Llave foranea de la tabla usuarios
        'fecha_registro',
    ];

    /**
     * Relación de uno a uno con la tabla de usuarios.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    /**
     * Relación de uno a muchos con la tabla de facturas.
     */
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_cliente');
    }

    /**
     * Relación de uno a muchos con la tabla de detalle_facturas.
     */
    public function detalleFacturas()
    {
        return $this->hasMany(DetalleFactura::class, 'id_cliente');
    }

    /**
     * Relación de uno a muchos con la tabla de reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_cliente');
    }
}
