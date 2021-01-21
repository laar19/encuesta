<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otras_opciones_preguntas extends Model
{
    public function preguntas() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\preguntas', 'id_preguntas');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }
}
