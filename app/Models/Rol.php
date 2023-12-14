<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'nombre_rol',
        'descripcion',
        
    ];

    /**
     * Relación de uno a uno con la tabla de usuarios.
     */
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_rol');
    }
}

