<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_conoci_cientifico_tecnologico_espacial_util;

class referencia_conoci_cientifico_tecnologico_espacial_util_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'La vida cotidiana'
        ]);

        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'El trabajo'
        ]);

        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'La comprensión del espacio exterior para el mejoramiento de la humanidad'
        ]);

        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'Preservar el entorno y el ambiente'
        ]);

        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'Seguridad y defensa de la nación'
        ]);

        referencia_conoci_cientifico_tecnologico_espacial_util::create([
            'descripcion' => 'Ninguna de las anteriores'
        ]);
    }
}
