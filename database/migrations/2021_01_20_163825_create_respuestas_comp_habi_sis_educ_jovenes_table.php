<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasCompHabiSisEducJovenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_comp_habi_sis_educ_jovenes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('respuesta');

            $table->integer('id_encuesta_principal')->unsigned();
            $table->foreign('id_encuesta_principal')->references('id')->on('encuesta_principals')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE respuestas_comp_habi_sis_educ_jovenes COMMENT = 'Pregunta #3. ¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes? (Seleccione máximo dos).'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_comp_habi_sis_educ_jovenes');
    }
}
