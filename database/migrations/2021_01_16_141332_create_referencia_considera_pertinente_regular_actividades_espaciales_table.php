<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaConsideraPertinenteRegularActividadesEspacialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_considera_pertinente_regular_actividades_espaciales', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_considera_pertinente_regular_actividades_espaciales COMMENT = 'Pregunta #22. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_considera_pertinente_regular_actividades_espaciales');
    }
}
