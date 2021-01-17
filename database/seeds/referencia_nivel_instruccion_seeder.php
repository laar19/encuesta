<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_nivel_instruccion;

class referencia_nivel_instruccion_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_nivel_instruccion::create([
            'descripcion' => 'Primaria'
        ]);

        referencia_nivel_instruccion::create([
            'descripcion' => 'Secundaria'
        ]);

        referencia_nivel_instruccion::create([
            'descripcion' => 'Estudios universitarios sin concluir'
        ]);

        referencia_nivel_instruccion::create([
            'descripcion' => 'Graduado universitario'
        ]);

        referencia_nivel_instruccion::create([
            'descripcion' => 'Estudios de postgrado sin concluir'
        ]);

        referencia_nivel_instruccion::create([
            'descripcion' => 'Graduado de postgrado'
        ]);
    }
}
