<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria',35);
            $table->string('grado',50);
            $table->string('seccion',5);
            $table->integer('capacidad');





            //esta seria la relacion con la tabla
            //de plan de estudios, por el momento comentada

            $table->unsignedBigInteger('anios_id')->unsigned();
            $table->foreign('anios_id')->references('id')->on('anios')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('plan_estudios_id')->unsigned();
            $table->foreign('plan_estudios_id')->references('id')->on('plan_estudios')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('turnos_id')->unsigned();
            $table->foreign('turnos_id')->references('id')->on('turnos')->onUpdate('cascade')->onDelete('cascade');
            //$table->unsignedBigInteger('id_planEstudio');
            //$table->foreignId('id_planEstudio')->references('id_planEstudio')->on('plan_estudio');
            //$table->unsignedBigInteger('cod_turno');
            //$table->foreignId('cod_turno')->references('cod_turno')->on('turno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grados');
    }
}
