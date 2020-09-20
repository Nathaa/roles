<?php

use App\Docente;
use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Docente::create([
            
            'nombre' => 'Donatila',
            'apellido' => 'Perez',
            'direccion' => 'San Salvador',
            'dui' => '05241617-3',
            'fecha_nacimiento' => '2020-09-13 23:02:50',
            'edad' => '20',
            'sexo' => 'F',
            'telefono' => '7654-3454',
            'turnos_id'=> '1',
           ]);


    }
}
