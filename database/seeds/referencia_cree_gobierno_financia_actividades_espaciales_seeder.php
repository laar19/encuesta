<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_cree_gobierno_financia_actividades_espaciales;

class referencia_cree_gobierno_financia_actividades_espaciales_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_cree_gobierno_financia_actividades_espaciales::create([
            'descripcion' => 'Si'
        ]);

        referencia_cree_gobierno_financia_actividades_espaciales::create([
            'descripcion' => 'No'
        ]);

        referencia_cree_gobierno_financia_actividades_espaciales::create([
            'descripcion' => 'No sabe'
        ]);
    }
}
