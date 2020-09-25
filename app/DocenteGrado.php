<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DocenteGrado extends Model
{



    //
    protected $fillable = [
        'docentes_id','grados_id', 'anios_id',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function grado()
    {
        return $this->hasOne(Grado::class);
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
