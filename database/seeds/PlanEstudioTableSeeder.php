<?php
use App\PlanEstudio;
use Illuminate\Database\Seeder;

class PlanEstudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PlanEstudio::create([
            'nombre_plan' => 'Cuscatlan',
            'duracion' => '5',

           ]);
    }
}
