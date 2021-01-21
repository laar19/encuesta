<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtrasOpcionesPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otras_opciones_preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('opcion');
            
            $table->string('id_preguntas');
            $table->foreign('id_preguntas')->references('id')->on('preguntas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE otras_opciones_preguntas COMMENT = 'opciones de las preguntas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otras_opciones_preguntas');
    }
}
