<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Estudiante extends Model
{


    //
    protected $fillable = [
        'imagen','nombre', 'apellido', 'fecha_nacimiento', 'edad', 'direccion', 'encargado', 'parentesco', 'telefono_emergencia',
        'padecimientos', 'descripcion_padecimiento', 'alergia_medicamento', 'nombre_padre', 'profesion_padre',
        'telefono_padre', 'nombre_madre', 'profesion_madre','telefono_madre',
    ];

    protected $dates = [
        'fecha_nacimiento'=>'date:Y-m-d',
        'created_at',
        'updated_at',
        
    ];

}
