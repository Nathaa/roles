<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion', 'users_id','estudiantes_id',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
}
