<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'esNegocio',
        'nombreComercio',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'cuenta',
        'usuarioCreacionId',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /**
     * Relación con el usuario que creó el cliente
     */
    public function usuarioCreacion()
    {
        return $this->belongsTo(User::class, 'usuarioCreacionId');
    }

    public function ventasGenerales()
    {
        return $this->hasMany(VentaGeneral::class, 'cliente_id');
    }
}
