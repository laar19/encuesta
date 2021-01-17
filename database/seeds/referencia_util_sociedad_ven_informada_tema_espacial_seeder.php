<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_util_sociedad_ven_informada_tema_espacial;

class referencia_util_sociedad_ven_informada_tema_espacial_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_util_sociedad_ven_informada_tema_espacial::create([
            'descripcion' => 'Si'
        ]);

        referencia_util_sociedad_ven_informada_tema_espacial::create([
            'descripcion' => 'No'
        ]);
    }
}
