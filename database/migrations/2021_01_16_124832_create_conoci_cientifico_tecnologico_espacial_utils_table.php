<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateConociCientificoTecnologicoEspacialUtilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conoci_cientifico_tecnologico_espacial_utils', function (Blueprint $table) {
            $table->id();

            $table->integer('vida_cotidiana')->comment('La vida cotidiana');
            
            $table->integer('trabajo')->comment('El trabajo');

            $table->integer('comprender_espacio_mejorar_humanidad')->comment('La comprensión del espacio exterior para el mejoramiento de la humanidad');

            $table->integer('preservar_entorno_ambiente')->comment('Preservar el entorno y el ambiente');

            $table->integer('seguridad_defensa_nacion')->comment('Seguridad y defensa de la nación');

            $table->integer('ninguna_anteriores')->comment('Ninguna de las anteriores');

            $table->integer('id_encuesta_principal');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE conoci_cientifico_tecnologico_espacial_utils COMMENT = 'Pregunta #6. Considera usted que el conocimiento científico y tecnológico en el tema espacial es útil para:'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conoci_cientifico_tecnologico_espacial_utils');
    }
}
