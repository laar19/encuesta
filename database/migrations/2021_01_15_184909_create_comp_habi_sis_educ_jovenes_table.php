<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCompHabiSisEducJovenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_habi_sis_educ_jovenes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('dominar_lenguaje_programacion')->comment('Dominar un lenguaje de programación');
            
            $table->integer('capacidad_resolver_problemas_complejos')->comment('Capacidad para resolver problemas complejos');

            $table->integer('hab_diseno_construc_robots')->comment('Habilidades para el diseño y construcción de robots');

            $table->integer('incentivar_curiosidad_ciencia_tecnologia')->comment('Incentivar la curiosidad por la ciencia y la tecnología');

            $table->integer('habito_lectura')->comment('El hábito por la lectura');

            $table->integer('id_encuesta_principal')->unsigned();
            $table->foreign('id_encuesta_principal')->references('id')->on('encuesta_principals')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE comp_habi_sis_educ_jovenes COMMENT = 'Pregunta #3. ¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes? (Seleccione máximo dos).'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comp_habi_sis_educ_jovenes');
    }
}
