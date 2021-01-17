<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_informado_sobre_satelites_venezolanos;

class referencia_informado_sobre_satelites_venezolanos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_informado_sobre_satelites_venezolanos::create([
            'descripcion' => 'Informado'
        ]);

        referencia_informado_sobre_satelites_venezolanos::create([
            'descripcion' => 'Algo informado'
        ]);

        referencia_informado_sobre_satelites_venezolanos::create([
            'descripcion' => 'Nada informado'
        ]);
    }
}
