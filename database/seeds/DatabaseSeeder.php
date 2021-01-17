<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(referencia_actividades_cientificas_seeder::class);
        $this->call(referencia_conoce_abae_seeder::class);
        $this->call(referencia_considera_pertinente_elaborar_plan_tema_espacial_seeder::class);
        $this->call(referencia_considera_pertinente_gobierno_promueva_investigacion_espacial_seeder::class);
        $this->call(referencia_considera_pertinente_regular_actividades_espaciales_seeder::class);
        $this->call(referencia_considera_satelite_simon_bolivar_efecto_positivo_seeder::class);
        $this->call(referencia_considera_ven_investiga_espacio_seeder::class);
        $this->call(referencia_cree_gobierno_financia_actividades_espaciales_seeder::class);
        $this->call(referencia_cual_considera_objetivo_ciencia_espacial_seeder::class);
        $this->call(referencia_defina_ciencia_tecnologia_espacial_seeder::class);
        $this->call(referencia_desarrollo_ciencia_tecno_espacial_servicio_de_seeder::class);
        $this->call(referencia_edad_seeder::class);
        $this->call(referencia_estados_de_venezuela_seeder::class);
        $this->call(referencia_estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales_seeder::class);
        $this->call(referencia_estudio_espacial_contribuye_desarrollo_productivo_seeder::class);
        $this->call(referencia_informado_sobre_satelites_venezolanos_seeder::class);
        $this->call(referencia_nivel_educ_cientifica_tec_recibido_seeder::class);
        $this->call(referencia_nivel_instruccion_seeder::class);
        $this->call(referencia_sabia_tenemos_dos_satelistes_observ_remota_seeder::class);
        $this->call(referencia_satisfecho_informacion_espacial_trasmite_medios_seeder::class);
        $this->call(referencia_si_existiera_mas_inversion_espacial_habria_avance_seeder::class);
        $this->call(referencia_util_sociedad_ven_informada_tema_espacial_seeder::class);
    }
}
