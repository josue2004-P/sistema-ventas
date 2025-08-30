<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaGeneral extends Model
{
    use HasFactory;

    protected $table = 'ventas_generales';

    protected $fillable = [
        'cliente_id',
        'anio',
        'mes',
        'ingresos_total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
