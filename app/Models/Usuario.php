<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'id_rol',
        'tipo_doc',
        'num_doc',
        'nombres',
        'correo',
        'apellido',
        'telefono',
        'nombre_usuario',
        'password',
        // Otros campos que puedas tener
    ];

    const USERNAME = 'nombre_usuario';
    const PASSWORD = 'password';

    /**
     * Relación de uno a uno con la tabla de roles.
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    /**
     * Relación de uno a muchos con la tabla de reservas.
     */
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_usuario');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Otras relaciones y funciones que puedas necesitar.
     */

    /**
     * Sobrescribir el método getAuthPassword para personalizar la columna de contraseña.
     */
    public function getAuthPassword()
    {
        return $this->attributes[self::PASSWORD];
    }
}

