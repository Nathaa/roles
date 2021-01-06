<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DocenteGrado extends Model
{



    //
    protected $fillable = [
        'docentes_id','asignacions_id', 'anios_id',

    ];
    protected  $table = 'docente_grados';
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function asignacion()
    {
        return $this->belongsTo('App\Asignacion', 'asignacions_id');
    }

    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
    public function anio()
    {
        return $this->hasOne(Anio::class);
    }

}
