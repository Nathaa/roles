<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //

    protected $fillable = [
        'nombre_periodo', 'duracion', 'fecha_inicio', 'fecha_fin',
    ];


}
