<?php

use App\Anio;
use Illuminate\Database\Seeder;

class AniosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Anio::create([
            'nombre' => 'Matutino',
            'duracion' => '36',
            'año' => '2020',
           ]);
           Anio::create([
            'nombre' => 'Matutino',
            'duracion' => '36',
            'año' => '2021',
           ]);
    }
}
