<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_considera_satelite_simon_bolivar_efecto_positivo;

class referencia_considera_satelite_simon_bolivar_efecto_positivo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_considera_satelite_simon_bolivar_efecto_positivo::create([
            'descripcion' => 'Positivos'
        ]);

        referencia_considera_satelite_simon_bolivar_efecto_positivo::create([
            'descripcion' => 'Negativos'
        ]);

        referencia_considera_satelite_simon_bolivar_efecto_positivo::create([
            'descripcion' => 'Ninguna de las anteriores'
        ]);
    }
}
