<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaConsideraPertinenteElaborarPlanTemaEspacialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_considera_pertinente_elaborar_plan_tema_espacials', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_considera_pertinente_elaborar_plan_tema_espacials COMMENT = 'Pregunta #24. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_considera_pertinente_elaborar_plan_tema_espacials');
    }
}
