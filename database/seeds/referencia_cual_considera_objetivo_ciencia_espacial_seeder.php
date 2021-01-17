<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_cual_considera_objetivo_ciencia_espacial;

class referencia_cual_considera_objetivo_ciencia_espacial_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_cual_considera_objetivo_ciencia_espacial::create([
            'descripcion' => 'Estudiar a los seres vivos'
        ]);

        referencia_cual_considera_objetivo_ciencia_espacial::create([
            'descripcion' => 'Estudiar, investigar e interpretar el espacio exterior'
        ]);

        referencia_cual_considera_objetivo_ciencia_espacial::create([
            'descripcion' => 'Contribuir con el desarrollo del país'
        ]);

        referencia_cual_considera_objetivo_ciencia_espacial::create([
            'descripcion' => 'Ninguna de las anteriores'
        ]);
    }
}
