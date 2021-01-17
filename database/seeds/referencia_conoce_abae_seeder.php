<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_conoce_abae;

class referencia_conoce_abae_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_conoce_abae::create([
            'descripcion' => 'Si'
        ]);

        referencia_conoce_abae::create([
            'descripcion' => 'No'
        ]);
    }
}
