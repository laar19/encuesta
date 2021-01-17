<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control_encuesta extends Model
{
    public function control_encuestado() {
        return $this->hasMany('App\control_encuestado');
    }

    public function encuesta_principal() {
        return $this->hasMany('App\encuesta_principal');
    }
}
