<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_nivel_educ_cientifica_tec_recibido;

class referencia_nivel_educ_cientifica_tec_recibido_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'Bajo'
        ]);

        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'Muy bajo'
        ]);

        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'Alto'
        ]);

        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'Muy alto'
        ]);

        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'No recibió educación científica, ni técnica'
        ]);

        referencia_nivel_educ_cientifica_tec_recibido::create([
            'descripcion' => 'No sabe'
        ]);
    }
}
