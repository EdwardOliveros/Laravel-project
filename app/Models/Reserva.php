<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'id_cliente',
        'fecha_reserva',
        'cant_habit',
        'adultos',
        'ninos',
        'fecha_inicio',
        'fecha_fin',
        'valor',
        'id_estado',
        // Otros campos que puedas tener
    ];

    /**
     * Relación de muchos a uno con la tabla de clientes.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Relación de muchos a uno con la tabla de estados de reservas.
     */
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'id_estado');
    }
}
