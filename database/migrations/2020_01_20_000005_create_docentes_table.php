<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen')->nullable();
            $table->string('nombre',120);
            $table->string('apellido',120);
            $table->string('direccion',200);
            $table->string('dui',10);
            $table->date('fecha_nacimiento');
            $table->string('sexo',1);
            $table->string('telefono');

            $table->unsignedBigInteger('turnos_id')->unsigned();
            $table->foreign('turnos_id')->references('id')->on('turnos')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('edad');

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
        Schema::dropIfExists('docentes');
    }
}
