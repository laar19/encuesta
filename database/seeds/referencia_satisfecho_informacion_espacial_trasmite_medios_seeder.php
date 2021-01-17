<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_satisfecho_informacion_espacial_trasmite_medios;

class referencia_satisfecho_informacion_espacial_trasmite_medios_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_satisfecho_informacion_espacial_trasmite_medios::create([
            'descripcion' => 'Si'
        ]);

        referencia_satisfecho_informacion_espacial_trasmite_medios::create([
            'descripcion' => 'No'
        ]);
    }
}
