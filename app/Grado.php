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



}
