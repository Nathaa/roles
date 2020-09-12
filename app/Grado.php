<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Grado extends Model
{

    public $timestamps = false;
    //
    protected $fillable = [
        'grado','seccion', 'categoria'
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
