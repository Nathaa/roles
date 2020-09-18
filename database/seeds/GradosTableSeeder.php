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
            'grado' => '7',
            'seccion' => '"B"',
            'categoria' => 'Tercer Ciclo',
            'capacidad' => '35',
            'anios_id' => '1',
            'plan_estudios_id' => '1',
            'turnos_id' => '1',

           ]);

           Grado::create([
            'grado' => '2',
            'seccion' => '"A"',
            'categoria' => 'Bachilllerato General',
            'capacidad' => '40',
            'anios_id' => '1',
            'plan_estudios_id' => '1',
            'turnos_id' => '2',

           ]);

           Grado::create([
            'grado' => '1',
            'seccion' => '"B"',
            'categoria' => 'Bachillerato Vocacional',
            'capacidad' => '40',
            'anios_id' => '2',
            'plan_estudios_id' => '1',
            'turnos_id' => '3',

           ]);
    }
}
