<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaSiExistieraMasInversionEspacialHabriaAvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_si_existiera_mas_inversion_espacial_habria_avances', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');

            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_si_existiera_mas_inversion_espacial_habria_avances COMMENT = 'Pregunta #21. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_si_existiera_mas_inversion_espacial_habria_avances');
    }
}
