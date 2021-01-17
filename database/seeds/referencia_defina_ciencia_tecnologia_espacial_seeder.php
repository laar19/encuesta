<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_defina_ciencia_tecnologia_espacial;

class referencia_defina_ciencia_tecnologia_espacial_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_defina_ciencia_tecnologia_espacial::create([
            'descripcion' => 'Un servicio'
        ]);

        referencia_defina_ciencia_tecnologia_espacial::create([
            'descripcion' => 'Un bien'
        ]);

        referencia_defina_ciencia_tecnologia_espacial::create([
            'descripcion' => 'Una herramienta'
        ]);

        referencia_defina_ciencia_tecnologia_espacial::create([
            'descripcion' => 'Un área del conocimiento'
        ]);

        referencia_defina_ciencia_tecnologia_espacial::create([
            'descripcion' => 'No sabe'
        ]);
    }
}
