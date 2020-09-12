<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

}
