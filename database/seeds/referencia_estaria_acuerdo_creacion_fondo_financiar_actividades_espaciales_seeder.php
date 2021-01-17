<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales;

class referencia_estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales::create([
            'descripcion' => 'Si'
        ]);

        referencia_estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales::create([
            'descripcion' => 'No'
        ]);
    }
}
