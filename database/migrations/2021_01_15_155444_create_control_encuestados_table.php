<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlEncuestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_encuestados', function (Blueprint $table) {
            $table->id();
            $table->integer('respondio_encuesta');
            $table->integer('id_encuestado');
            $table->integer('id_control_encuesta');
            $table->timestamps();
        });
        DB:select("ALTER TABLE control_encuestados COMMENT = 'Controla que el encuestado responda la encuesta una sóla vez'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_encuestados');
    }
}
