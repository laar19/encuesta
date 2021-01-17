<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaConoceAbaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_conoce_abaes', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No');

            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_conoce_abaes COMMENT = 'Pregunta #10. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_conoce_abaes');
    }
}
