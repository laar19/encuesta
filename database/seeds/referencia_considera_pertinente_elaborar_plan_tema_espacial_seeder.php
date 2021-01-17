<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_considera_pertinente_elaborar_plan_tema_espacial;

class referencia_considera_pertinente_elaborar_plan_tema_espacial_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_considera_pertinente_elaborar_plan_tema_espacial::create([
            'descripcion' => 'Si'
        ]);

        referencia_considera_pertinente_elaborar_plan_tema_espacial::create([
            'descripcion' => 'No'
        ]);
    }
}
