<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('anios_id')->unsigned();
            $table->foreign('anios_id')->references('id')->on('anios')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('materias_id')->unsigned();
            $table->foreign('materias_id')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('grados_id')->unsigned();
            $table->foreign('grados_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('periodos_id')->unsigned();
            $table->foreign('periodos_id')->references('id')->on('periodos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tipo_nota');
            $table->string('valor_nota')->nullable();
            $table->string('ponderacion');
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
        Schema::dropIfExists('notas');
    }
}
