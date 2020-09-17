<?php

use App\Turno;
use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Turno::create([
            'nombre_turno' => 'Matutino',
            'hora_entrada' => '07:00:00',
            'hora_salida' => '12:00:00',
           ]);
           Turno::create([
            'nombre_turno' => 'Vespertino',
            'hora_entrada' => '13:00:00',
            'hora_salida' => '18:00:00',
           ]);
           Turno::create([
            'nombre_turno' => 'Completo',
            'hora_entrada' => '07:00:00',
            'hora_salida' => '17:00:00',
           ]);
    }
}
