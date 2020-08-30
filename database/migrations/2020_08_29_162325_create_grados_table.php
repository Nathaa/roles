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
            $table->string('categoria',20);
            $table->string('grado',15);
            $table->string('seccion',3);
            //esta seria la relacion con la tabla
            //de plan de estudios, por el momento comentada
            //$table->unsignedBigInteger('id_planEstudio');
            //$table->foreignId('id_planEstudio')->references('id_planEstudio')->on('plan_estudio');
            //$table->unsignedBigInteger('cod_turno');
            //$table->foreignId('cod_turno')->references('cod_turno')->on('turno');
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
        Schema::dropIfExists('grados');
    }
}
