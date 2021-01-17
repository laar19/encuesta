<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaNivelInstruccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_nivel_instruccions', function (Blueprint $table) {
            $table->id();
            
            $table->string('descripcion')->comment('Primaria. Secundaria. Estudios universitarios sin concluir. Graduado universitario. Estudios de postgrado sin concluir. Graduado de postgrado');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_nivel_instruccions COMMENT = 'Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_nivel_instruccions');
    }
}
