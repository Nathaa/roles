<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentegradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('docentes_id')->unsigned();
            $table->foreign('docentes_id')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('asignacions_id')->unsigned();
            $table->foreign('asignacions_id')->references('id')->on('asignacions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('anios_id')->unsigned();
            $table->foreign('anios_id')->references('id')->on('anios')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('docentegrado');
    }
}
