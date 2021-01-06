<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    protected $fillable = [
        'estudiantes_id', 'materias-id','grados_id','prom-per-1',
        'prom-per-2','prom-per-3','prom-per-4', 'prom-final','anios_id',

    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }
}
