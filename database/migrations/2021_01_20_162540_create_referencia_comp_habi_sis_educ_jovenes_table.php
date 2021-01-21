<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaCompHabiSisEducJovenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_comp_habi_sis_educ_jovenes', function (Blueprint $table) {
            $table->id();
            
            $table->string('descripcion');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_comp_habi_sis_educ_jovenes COMMENT = 'Pregunta #3. ¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes? (Seleccione máximo dos).'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_comp_habi_sis_educ_jovenes');
    }
}
