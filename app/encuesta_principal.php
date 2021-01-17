<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuesta_principal extends Model
{
    public function encuestado() {
        return $this->belongsTo('App\Encuestado');
    }

    public function control_encuesta() {
        return $this->belongsTo('App\Control_encuesta');
    }

    public function actividades_cientificas() {
        return $this->hasOne('App\actividades_cientificas');
    }

    public function comp_habi_sis_educ_jovenes() {
        return $this->hasOne('App\comp_habi_sis_educ_jovenes');
    }

    public function conoci_cientifico_tecnologico_espacial_util() {
        return $this->hasOne('App\conoci_cientifico_tecnologico_espacial_util');
    }

    public function conoce_o_no_conoce_organismos() {
        return $this->hasOne('App\conoce_o_no_conoce_organismos');
    }

    public function a_que_atribuye_poco_avance_tema_espacial() {
        return $this->hasOne('App\a_que_atribuye_poco_avance_tema_espacial');
    }

    public function aspectos_ciencia_espacial_interesaria() {
        return $this->hasOne('App\aspectos_ciencia_espacial_interesaria');
    }
}
