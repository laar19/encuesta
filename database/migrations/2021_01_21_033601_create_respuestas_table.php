<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->integer('opcion')->nullable();
            $table->string('respuesta');

            $table->string('id_preguntas');
            $table->foreign('id_preguntas')->references('id')->on('preguntas')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_encuestado')->unsigned();
            $table->foreign('id_encuestado')->references('id')->on('encuestados')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_control_encuesta')->unsigned();
            $table->foreign('id_control_encuesta')->references('id')->on('control_encuestas')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('respuestas');
    }
}
