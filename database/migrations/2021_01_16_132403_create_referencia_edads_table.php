<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaEdadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_edads', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('<=18 años. >18 y <=30 años. >30 y <=50 años. >50 años');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_edads COMMENT = 'Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_edads');
    }
}
