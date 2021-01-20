<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAQueAtribuyePocoAvanceTemaEspacialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_que_atribuye_poco_avance_tema_espacials', function (Blueprint $table) {
            $table->id();

            $table->integer('poca_inversion')->comment('Poca inversión en el área');

            $table->integer('carencia_cientificos_ingenieros')->comment('Carencia de científicos e ingenieros en el área');

            $table->integer('sociedad_ven_poco_interes_tema_espacial')->comment('La sociedad venezolana no está interesada en el tema espacial');

            $table->integer('no_haya_investigacion_cientifica_tema_espacial')->comment('No se realiza investigación científica en el tema espacial');

            $table->integer('no_existe_infraestructura')->comment('No existe la infraestructura necesaria');

            $table->integer('empresas_privadas_no_apoyan')->comment('Las empresas privadas no apoyan la investigación en el área espacial');

            $table->integer('bloqueo_economico')->comment('El bloqueo unilateral de los EE.UU.');

            $table->integer('crisis_economica')->comment('La crisis económica');

            $table->integer('id_encuesta_principal')->unsigned();
            $table->foreign('id_encuesta_principal')->references('id')->on('encuesta_principals')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE a_que_atribuye_poco_avance_tema_espacials COMMENT = 'Pregunta #12. ¿A qué atribuye usted que en nuestro país no exista mayor avance en el tema espacial?'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_que_atribuye_poco_avance_tema_espacials');
    }
}
