<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_si_existiera_mas_inversion_espacial_habria_avance;

class referencia_si_existiera_mas_inversion_espacial_habria_avance_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_si_existiera_mas_inversion_espacial_habria_avance::create([
            'descripcion' => 'Si'
        ]);

        referencia_si_existiera_mas_inversion_espacial_habria_avance::create([
            'descripcion' => 'No'
        ]);
    }
}
