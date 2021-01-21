<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\referencia_comp_habi_sis_educ_jovenes;

class referencia_comp_habi_sis_educ_jovenes_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        referencia_comp_habi_sis_educ_jovenes::create([
            'descripcion' => 'Dominar un lenguaje de programación'
        ]);

        referencia_comp_habi_sis_educ_jovenes::create([
            'descripcion' => 'Capacidad para resolver problemas complejos'
        ]);

        referencia_comp_habi_sis_educ_jovenes::create([
            'descripcion' => 'Habilidades para el diseño y construcción de robots'
        ]);

        referencia_comp_habi_sis_educ_jovenes::create([
            'descripcion' => 'Incentivar la curiosidad por la ciencia y la tecnología'
        ]);

        referencia_comp_habi_sis_educ_jovenes::create([
            'descripcion' => 'El hábito por la lectura'
        ]);
    }
}
