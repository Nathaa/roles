<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Estudiante::class, function (Faker $faker) {
    return [
        //

        'imagen' =>$faker->sentence,
        'nombre' =>$faker->sentence,
        'apellido' =>$faker->sentence,
        'fecha_nacimiento' =>$faker->date,
        'edad' =>$faker->randomNumber,
        'direccion' =>$faker->sentence,
        'encargado' =>$faker->sentence,
        'parentesco' =>$faker->sentence,
        'telefono_emergencia' =>$faker->sentence,
        'padecimientos' =>$faker->sentence,
        'descripcion_padecimiento' =>$faker->sentence,
        'alergia_medicamento' =>$faker->sentence,
        'nombre_padre' =>$faker->sentence,
        'profesion_padre' =>$faker->sentence,
        'telefono_padre' =>$faker->sentence,
        'nombre_madre' =>$faker->sentence,
        'profesion_madre' =>$faker->sentence,
        'telefono_madre' =>$faker->sentence,

    ];
});
