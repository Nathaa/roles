<?php

namespace Tests\Feature;

use App\Periodo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PeriodosControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
   public function periodos_recuperar()
   {
    $this->withoutExceptionHandling();
    $response= $this->get('periodos');
    $response->assertOk();
    $periodos= Periodo::all();
    $response->assertViewHas('periodos.index');
   }



/** @test */
    public function creacion_periodos()
    {
        $this->withoutExceptionHandling();
       $response=$this->post('periodos', [
        'nombre_periodo' => 'Trimestre 1',
        'duracion' => '12',
        'fecha_inicio' => '2020-09-17',
        'fecha_fin' => '2020-09-17',
       ]);

        $response->assertOk();
        $this->assertCount(5, Periodo::all());

        $periodo= Periodo::first();

        $this->assertEquals($periodo->nombre_periodo, 'Trimestre 1');
        $this->assertEquals($periodo->duracion, '12');
        $this->assertEquals($periodo->fecha_inicio, '2020-09-17');
        $this->assertEquals($periodo->fecha_fin, '2020-09-17');
    }

}
