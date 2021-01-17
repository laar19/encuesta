<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_sabia_tenemos_dos_satelistes_observ_remota;

class referencia_sabia_tenemos_dos_satelistes_observ_remota_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_sabia_tenemos_dos_satelistes_observ_remota::create([
            'descripcion' => 'Si'
        ]);

        referencia_sabia_tenemos_dos_satelistes_observ_remota::create([
            'descripcion' => 'No'
        ]);
    }
}
