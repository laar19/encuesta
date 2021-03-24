<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->integer('cedula_encuestado');
            $table->integer('region');
            $table->integer('nivel_instruccion');
            $table->integer('rango_edad');
            $table->integer('genero');
            
            $table->integer('id_encuestado')->unsigned();
            $table->foreign('id_encuestado')->references('id')->on('encuestados')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('id_control_encuesta')->unsigned();
            $table->foreign('id_control_encuesta')->references('id')->on('control_encuestas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE control_encuestados COMMENT = 'Controla que el encuestado responda la encuesta una sóla vez'");
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
