<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_plan',20);
            //ejemplo duracion de plan 01/01/2019 nombre plan cuscatlan
            //fin del plan en 31/12/2024
            //capturar fecha inicio y fecha fin en formulario para luego calcular la duracion.
            //pondria ininio y fin de plan en la tabla para, en caso de extender un plan por otro
            //gobierno , se puede modificar el plan actual
            //$table->date('inicio_plan');
            //$table->date('fin_plan');
            $table->string('duracion',10);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_estudio');
    }
}
