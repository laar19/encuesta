<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaCualConsideraObjetivoCienciaEspacialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_cual_considera_objetivo_ciencia_espacials', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Estudiar a los seres vivos. Estudiar, investigar e interpretar el espacio exterior. Contribuir con el desarrollo del país. Ninguna de las anteriores');

            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_cual_considera_objetivo_ciencia_espacials COMMENT = 'Pregunta #5. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_cual_considera_objetivo_ciencia_espacials');
    }
}
