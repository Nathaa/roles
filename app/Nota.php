<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'estudiantes_id', 'materias_id','grados_id','anios_id', 'valor_nota','periodos_id', 'tipo_nota','ponderacion',
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

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
