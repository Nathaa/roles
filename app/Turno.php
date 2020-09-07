<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'nombre_turno', 'hora_entrada', 'hora_salida',
    ];
}
