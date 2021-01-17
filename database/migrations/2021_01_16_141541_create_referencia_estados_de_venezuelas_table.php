<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaEstadosDeVenezuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_estados_de_venezuelas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_estado');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_estados_de_venezuelas COMMENT = 'Tabla de referencia con los nombres de los estados de Venezuela precargados'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_estados_de_venezuelas');
    }
}
