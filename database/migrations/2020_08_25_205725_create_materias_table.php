<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->string('descripcion',200);
            $table->boolean('estado');


            $table->integer('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('docentes_id')->unsigned();
            $table->foreign('docentes_id')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('grados_id')->unsigned();
            $table->foreign('grados_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('materias');
    }
}
