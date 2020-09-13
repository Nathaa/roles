<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //

    protected $fillable = [
        'nombre', 'duracion', 'fecha_inicio', 'fecha_fin','grados_id',
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
