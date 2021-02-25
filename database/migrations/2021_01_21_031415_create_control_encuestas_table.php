<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateControlEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_encuestas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_apertura');
            $table->date('fecha_cierre');
            $table->integer('aperturada');
            $table->timestamps();
        });
        \DB::query("ALTER TABLE control_encuestas COMMENT = 'Controla la cantidad de veces que se apertura la encuesta al público'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_encuestas');
    }
}
