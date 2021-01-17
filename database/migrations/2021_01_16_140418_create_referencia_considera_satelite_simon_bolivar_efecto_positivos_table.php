<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaConsideraSateliteSimonBolivarEfectoPositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_considera_satelite_simon_bolivar_efecto_positivos', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Positivos. Negativos. Ninguna de las anteriores');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_considera_satelite_simon_bolivar_efecto_positivos COMMENT = 'Pregunta #18. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_considera_satelite_simon_bolivar_efecto_positivos');
    }
}
