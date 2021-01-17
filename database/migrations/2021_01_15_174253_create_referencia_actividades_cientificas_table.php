<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaActividadesCientificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_actividades_cientificas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        \DB::query("ALTER TABLE actividades_cientificas COMMENT = 'Pregunta #1. De las siguientes actividades cuales considera usted que son Muy científicas, Nada científicas o Poco científicas:. Selección múltiple'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_actividades_cientificas');
    }
}
