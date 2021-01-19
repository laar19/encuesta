<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAspectosCienciaEspacialInteresariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspectos_ciencia_espacial_interesarias', function (Blueprint $table) {
            $table->id();

            $table->integer('astronomia')->comment('Astronomía');

            $table->integer('ing_aeroespacial')->comment('Ingeniería aeroespacial');

            $table->integer('puesta_orbita_satelites')->comment('Puesta en órbita de satélite');

            $table->integer('exploracion_espacial')->comment('Exploración espacial');

            $table->integer('vuelos_espaciales')->comment('Vuelos espaciales tripulados y no tripulados');

            $table->integer('observacion_tierra')->comment('Observación de la Tierra');

            $table->integer('id_encuesta_principal')->unsigned();
            $table->foreign('id_encuesta_principal')->references('id')->on('encuesta_principals');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE aspectos_ciencia_espacial_interesarias COMMENT = 'Pregunta #15. ¿En qué aspectos de la ciencia espacial usted se interesaría?'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspectos_ciencia_espacial_interesarias');
    }
}
