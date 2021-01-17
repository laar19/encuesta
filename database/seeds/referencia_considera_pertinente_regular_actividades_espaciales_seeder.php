<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_considera_pertinente_regular_actividades_espaciales;

class referencia_considera_pertinente_regular_actividades_espaciales_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_considera_pertinente_regular_actividades_espaciales::create([
            'descripcion' => 'Si'
        ]);

        referencia_considera_pertinente_regular_actividades_espaciales::create([
            'descripcion' => 'No'
        ]);
    }
}
