<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaDesarrolloCienciaTecnoEspacialServicioDesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_desarrollo_ciencia_tecno_espacial_servicio_des', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('El Gobierno. La sociedad. La industria militar. Las empresas privadas. Todas las anteriores');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_desarrollo_ciencia_tecno_espacial_servicio_des COMMENT = 'Pregunta #7. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_desarrollo_ciencia_tecno_espacial_servicio_des');
    }
}
