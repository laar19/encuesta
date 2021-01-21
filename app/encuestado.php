<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuestado extends Model
{
    public function control_encuestado() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\control_encuestado', 'id_encuestado');
        //return $this->hasOne('App\control_encuestado', 'id_encuestado', 'id');
    }

    public function respuestas() {
        //return $this->hasMany('App\encuesta_principal');
        return $this->hasMany('App\respuestas', 'id_encuestado');
        //return $this->hasOne('App\encuesta_principal', 'id_encuestado', 'id');
    }
}
