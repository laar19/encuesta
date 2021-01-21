<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaConociCientificoTecnologicoEspacialUtilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_conoci_cientifico_tecnologico_espacial_utils', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion');
            
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
        Schema::dropIfExists('referencia_conoci_cientifico_tecnologico_espacial_utils');
    }
}
