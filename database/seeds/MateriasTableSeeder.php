<?php
use App\Materia;

use Illuminate\Database\Seeder;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Materia::create([
            'nombre' => 'Matematica',
            'descripcion' => 'dcececc',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Lenguaje',
            'descripcion' => 'gergerg',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Ciencias Naturales',
            'descripcion' => 'rgerg',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Sociales',
            'descripcion' => 'erge',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Ingles',
            'descripcion' => 'bege',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Habilitacion Laboral',
            'descripcion' => 'jlkjl',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Orientacio para la vida',
            'descripcion' => 'jhkjhk',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Seminario',
            'descripcion' => 'kjhkj',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Computacion',
            'descripcion' => 'jkjkj',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Psicologia',
            'descripcion' => 'sefe',
            'estado' => '1',
           ]);
           Materia::create([
            'nombre' => 'Educacion Fisica',
            'descripcion' => 'jkjn',
            'estado' => '1',
           ]);

    }
}
