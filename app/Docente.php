<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Docente extends Model
{

    public $table = 'docentes';

    //
    protected $fillable = [
        'nombre', 'apellido', 'fecha_nacimiento', 'edad', 'direccion', 'dui', 'sexo', 'telefono', 'turnos_id',

    ];

    protected $dates = [
        'fecha_nacimiento',
        'created_at',
        'updated_at',
    ];

    public function turno()
    {
        return $this->hasOne(Turno::class);
    }

}
