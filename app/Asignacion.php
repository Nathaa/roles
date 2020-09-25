<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //



    protected $fillable = [
        'grados_id','materias_id', 'periodos_id',
    ];

    public function grado()
    {
        return $this->hasOne(Grado::class);
    }
    public function materia()
    {

        return $this->belongsToMany(Materia::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
