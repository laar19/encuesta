<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_actividades_cientificas;

class referencia_actividades_cientificas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_actividades_cientificas::create([
            'descripcion' => 'Deporte'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Astronomía'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Medicina'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Política'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Exploración espacial'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Física'
        ]);

        referencia_actividades_cientificas::create([
            'descripcion' => 'Lanzamiento de cohetes'
        ]);
    }
}
