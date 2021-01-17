<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciaDefinaCienciaTecnologiaYEspacialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_defina_ciencia_tecnologia_y_espacials', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Un servicio. Un bien. Una herramienta. Un área del conocimiento. No sabe');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE referencia_defina_ciencia_tecnologia_y_espacials COMMENT = 'Pregunta #4. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_defina_ciencia_tecnologia_y_espacials');
    }
}
