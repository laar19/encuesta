<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_considera_ven_investiga_espacio;

class referencia_considera_ven_investiga_espacio_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_considera_ven_investiga_espacio::create([
            'descripcion' => 'Si'
        ]);

        referencia_considera_ven_investiga_espacio::create([
            'descripcion' => 'No'
        ]);
    }
}
