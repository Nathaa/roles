<?php

use Illuminate\Database\Seeder;
use App\Grado;
class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Grado::create([
            'categoria' => 'Tercer Ciclo',
            'grado' => '7',
            'seccion' => '"B"',
            'capacidad' => '35',
            'anios_id' => '1',
            'plan_estudios_id' => '1',
            'turnos_id' => '1',

           ]);

           Grado::create([
            'categoria' => 'Bachilllerato General',
            'grado' => '2',
            'seccion' => '"A"',
            'capacidad' => '40',
            'anios_id' => '1',
            'plan_estudios_id' => '1',
            'turnos_id' => '2',

           ]);

           Grado::create([
            'categoria' => 'Bachillerato Vocacional',
            'grado' => '1',
            'seccion' => '"B"',
            'capacidad' => '40',
            'anios_id' => '2',
            'plan_estudios_id' => '1',
            'turnos_id' => '3',

           ]);
    }
}
