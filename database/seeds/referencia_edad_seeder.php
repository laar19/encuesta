<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_edad;

class referencia_edad_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_edad::create([
            'descripcion' => '<=18 años'
        ]);

        referencia_edad::create([
            'descripcion' => '>18 y <=30 años'
        ]);

        referencia_edad::create([
            'descripcion' => '>30 y <=50 años'
        ]);

        referencia_edad::create([
            'descripcion' => '>50 años'
        ]);
    }
}
