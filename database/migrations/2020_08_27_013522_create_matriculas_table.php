<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',120);
            $table->string('descripcion',120);
            $table->date('fecha_matricula',120);//nuevo
            $table->string('tipoMatricula',15);//nuevo


            $table->unsignedBigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('grados_id')->unsigned();
            $table->foreign('grados_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            /* $table->bigIncrements('id');
            $table->string('nombre',120);
            $table->string('descripcion',120);

            $table->unsignedBigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
