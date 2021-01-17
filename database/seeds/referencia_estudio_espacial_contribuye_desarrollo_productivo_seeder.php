<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_estudio_espacial_contribuye_desarrollo_productivo;

class referencia_estudio_espacial_contribuye_desarrollo_productivo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_estudio_espacial_contribuye_desarrollo_productivo::create([
            'descripcion' => 'Si'
        ]);

        referencia_estudio_espacial_contribuye_desarrollo_productivo::create([
            'descripcion' => 'No'
        ]);
    }
}
