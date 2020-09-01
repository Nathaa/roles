<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Docente extends Model
{


    //
    protected $fillable = [
        'nombre', 'apellido', 'fecha_nacimiento', 'edad', 'direccion', 'dui', 'sexo', 'telefono',
        
    ];

    protected $dates = [
        'fecha_nacimiento',
        'created_at',
        'updated_at',
    ];

}
