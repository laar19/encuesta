<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opciones_preguntas extends Model
{
    public function preguntas() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\preguntas', 'id_preguntas');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }

    public function respuestas() {
        //return $this->hasMany('App\encuesta_principal');
        return $this->hasMany('App\respuestas', 'id_control_encuesta');
        //return $this->hasMany('App\encuesta_principal', 'id_control_encuesta', 'id');
    }
}
