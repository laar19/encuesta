<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaNivelEducCientificaTecRecibidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_nivel_educ_cientifica_tec_recibidos', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Bajo. Muy bajo. Alto. Muy alto, No recibió educación científica, ni técnica. No sabe');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_nivel_educ_cientifica_tec_recibidos COMMENT = 'Pregunta #2. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_nivel_educ_cientifica_tec_recibidos');
    }
}
