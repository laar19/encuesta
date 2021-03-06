<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateActividadesCientificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_cientificas', function (Blueprint $table) {
            $table->id();
            $table->integer('deporte');
            $table->integer('astronomia');
            $table->integer('medicina');
            $table->integer('politica');
            $table->integer('exploracion_espacial');
            $table->integer('fisica');
            $table->integer('lanzamiento_de_cohetes');
            
            $table->integer('id_encuesta_principal')->unsigned();
            $table->foreign('id_encuesta_principal')->references('id')->on('encuesta_principals')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE actividades_cientificas COMMENT = 'Pregunta #1. De las siguientes actividades cuales considera usted que son Muy científicas, Nada científicas o Poco científicas. Selección múltiple'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_cientificas');
    }
}
