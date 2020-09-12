<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //

    protected $fillable = [
        'nombre', 'duracion', 'fecha_inicio', 'fecha_fin',
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
