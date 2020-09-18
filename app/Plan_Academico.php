<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_Academico extends Model
{
    //
    protected $fillable = [
        'grados_id','materias_id', 'periodos_id',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
