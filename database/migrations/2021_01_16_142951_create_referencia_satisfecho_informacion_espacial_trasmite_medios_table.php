<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaSatisfechoInformacionEspacialTrasmiteMediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_satisfecho_informacion_espacial_trasmite_medios', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_satisfecho_informacion_espacial_trasmite_medios COMMENT = 'Pregunta #13. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_satisfecho_informacion_espacial_trasmite_medios');
    }
}
