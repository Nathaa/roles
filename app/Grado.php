<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Grado extends Model
{

    public $timestamps = false;
    //
    protected $fillable = [
        'grado','seccion', 'categoria', 'anios_id', 'plan_estudios_id','docentes_id'
    ];

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }
    public function plaEstudio()
    {
        return $this->belongsTo(PlanEstudio::class);
    }

    public function turno()
    {
        return $this->hasOne(Turno::class);
    }


}
