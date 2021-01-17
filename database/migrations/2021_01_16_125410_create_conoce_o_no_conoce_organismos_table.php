<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConoceONoConoceOrganismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conoce_o_no_conoce_organismos', function (Blueprint $table) {
            $table->id();

            $table->integer('mppct');
            $table->integer('ivic');
            $table->integer('abae');
            $table->integer('idea');
            $table->integer('cida');
            $table->integer('fii');
            $table->integer('ciae');
            $table->integer('dida');
            $table->integer('cenditel');
            $table->integer('cendit');
            $table->integer('cntq');
            $table->integer('intevep');
            $table->integer('id_encuesta_principal');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE conoce_o_no_conoce_organismos COMMENT = 'Pregunta #11. Señale para cada uno de los siguientes organismos, si usted conoce, Mucho, Algo, Poco, o No conoce:'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conoce_o_no_conoce_organismos');
    }
}
