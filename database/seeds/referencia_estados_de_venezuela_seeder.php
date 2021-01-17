<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_estados_de_venezuela;

class referencia_estados_de_venezuela_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Amazonas'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Anzoátegui'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Apure'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Aragua'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Barinas'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Bolívar'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Carabobo'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Cojedes'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Delta Amacuro'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Distrito Capital'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Falcón'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Guárico'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Lara'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'La Guaira'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Mérida'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Miranda'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Monagas'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Nueva Esparta'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Portuguesa'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Sucre'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Táchira'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Trujillo'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Yaracuy'
        ]);

        referencia_estados_de_venezuela::create([
            'nombre_estado' => 'Zulia'
        ]);
    }
}
