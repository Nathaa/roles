<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion','fecha_matricula', 'users_id','estudiantes_id','grados_id','tipoMatricula'
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
    protected $dates = [
        'fecha_matricula'=> 'date:Y-m-d',
        'created_at',
        'updated_at',
    ];
}
