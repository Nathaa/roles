<?php

use App\Periodo;
use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Periodo::create([
            'nombre' => 'Trimestre 1',
            'duracion' => '12',
            'fecha_inicio' => '2020-09-17',
            'fecha_fin' => '2020-09-17',


           ]);

           Periodo::create([
            'nombre' => 'Trimestre 2',
            'duracion' => '12',
            'fecha_inicio' => '2020-09-17',
            'fecha_fin' => '2020-09-17',


           ]);

           Periodo::create([
            'nombre' => 'Trimestre 3',
            'duracion' => '12',
            'fecha_inicio' => '2020-09-17',
            'fecha_fin' => '2020-09-17',


           ]);

           Periodo::create([
            'nombre' => 'Trimestre 4',
            'duracion' => '12',
            'fecha_inicio' => '2020-09-17',
            'fecha_fin' => '2020-09-17',


           ]);


    }
}
