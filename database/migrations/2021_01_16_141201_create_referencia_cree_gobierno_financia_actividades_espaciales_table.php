<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReferenciaCreeGobiernoFinanciaActividadesEspacialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencia_cree_gobierno_financia_actividades_espaciales', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion')->comment('Si. No. No sabe');
            
            $table->timestamps();
        });
        \DB::query("ALTER TABLE referencia_cree_gobierno_financia_actividades_espaciales COMMENT = 'Pregunta #20. Tabla de referencia con las opciones precargadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_cree_gobierno_financia_actividades_espaciales');
    }
}
