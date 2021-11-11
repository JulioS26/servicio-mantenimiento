<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordene extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulario',
        'mantenimiento',
        'equipo',
        'codigo',
        'frecuencia',
        'mes',
        'horaInicio',
        'horaFinal',
        'tiempoTotal',
        'actividades',
        'observaciones',
        'materiales',
    ];
}
