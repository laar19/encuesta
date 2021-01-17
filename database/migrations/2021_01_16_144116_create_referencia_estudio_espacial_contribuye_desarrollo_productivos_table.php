<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaEstudioEspacialContribuyeDesarrolloProductivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_estudio_espacial_contribuye_desarrollo_productivos', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_considera_ciencia_espacial_contribuye_desarrollo_econo_pais COMMENT = 'Pregunta #9. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_estudio_espacial_contribuye_desarrollo_productivos');
    }
}
