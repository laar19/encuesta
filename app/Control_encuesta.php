<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control_encuesta extends Model
{
    public function control_encuestado() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\control_encuestado', 'id_control_encuesta');
        //return $this->hasMany('App\control_encuestado', 'id_control_encuesta', 'id');
    }

    public function encuesta_principal() {
        //return $this->hasMany('App\encuesta_principal');
        return $this->hasMany('App\encuesta_principal', 'id_control_encuesta');
        //return $this->hasMany('App\encuesta_principal', 'id_control_encuesta', 'id');
    }
}
