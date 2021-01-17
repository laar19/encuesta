<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaConsideraPertinenteGobiernoPromuevaInvestigacionEspacialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_considera_pertinente_gobierno_promueva_investigacion_espacials', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_considera_pertinente_gobierno_promueva_investigacion_espacials COMMENT = 'Pregunta #19. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_considera_pertinente_gobierno_promueva_investigacion_espacials');
    }
}
