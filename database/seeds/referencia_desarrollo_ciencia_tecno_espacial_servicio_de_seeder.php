<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_desarrollo_ciencia_tecno_espacial_servicio_de;

class referencia_desarrollo_ciencia_tecno_espacial_servicio_de_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_desarrollo_ciencia_tecno_espacial_servicio_de::create([
            'descripcion' => 'El Gobierno'
        ]);

        referencia_desarrollo_ciencia_tecno_espacial_servicio_de::create([
            'descripcion' => 'La sociedad'
        ]);

        referencia_desarrollo_ciencia_tecno_espacial_servicio_de::create([
            'descripcion' => 'La industria militar'
        ]);

        referencia_desarrollo_ciencia_tecno_espacial_servicio_de::create([
            'descripcion' => 'Las empresas privadas'
        ]);

        referencia_desarrollo_ciencia_tecno_espacial_servicio_de::create([
            'descripcion' => 'Todas las anteriores'
        ]);
    }
}
