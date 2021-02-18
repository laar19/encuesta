<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            //$table->id();
            $table->string('id')->primary();
            $table->string('pregunta');
            $table->integer('tipo_pregunta')->nullable(); // 1 Seleción simple. 2 Selección múltiple. 3 texto
            $table->timestamps();
        });
        \DB::query("ALTER TABLE preguntas COMMENT = 'Preguntas de la encuesta'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
