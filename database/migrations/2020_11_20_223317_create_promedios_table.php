<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promedios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estudiantes_id')->unsigned();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('materias_id')->unsigned();
            $table->foreign('materias_id')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('grados_id')->unsigned();
            $table->foreign('grados_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('anios_id')->unsigned();
            $table->foreign('anios_id')->references('id')->on('anios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('prom_per_1')->nullable();
            $table->string('prom_per_2')->nullable();
            $table->string('prom_per_3')->nullable();
            $table->string('prom_per_4')->nullable();
            $table->string('prom_final')->nullable();
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
        Schema::dropIfExists('promedios');
    }
}
