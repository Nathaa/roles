<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    protected $fillable = [
        'estudiantes_id', 'materias_id','grados_id','prom_per_1',
        'prom_per_2','prom_per_3','prom_per_4', 'prom_final','anios_id',

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
