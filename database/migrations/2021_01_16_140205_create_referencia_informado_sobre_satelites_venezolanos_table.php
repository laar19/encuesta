<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaInformadoSobreSatelitesVenezolanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_informado_sobre_satelites_venezolanos', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Informado. Algo informado. Nada Informado');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_informado_sobre_satelites_venezolanos COMMENT = 'Pregunta #16. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_informado_sobre_satelites_venezolanos');
    }
}
