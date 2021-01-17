<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaConsideraVenInvestigaEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_considera_ven_investiga_espacios', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_considera_ven_investiga_espacios COMMENT = 'Pregunta #8. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_considera_ven_investiga_espacios');
    }
}
