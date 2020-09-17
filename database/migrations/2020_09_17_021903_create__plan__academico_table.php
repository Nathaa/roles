<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_plan__academico', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('grados_id')->unsigned();
            $table->foreign('grados_id')->references('id')->on('grados')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('materias_id')->unsigned();
            $table->foreign('materias_id')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('periodos_id')->unsigned();
            $table->foreign('periodos_id')->references('id')->on('periodos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('_plan__academico');
    }
}
