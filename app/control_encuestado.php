<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class control_encuestado extends Model
{
    public function encuestado() {
        //return $this->belongsTo('App\Encuestado');
        return $this->belongsTo('App\Encuestado', 'id_encuestado');
        //return $this->belongsTo('App\Encuestado', 'id_encuestado', 'id');
    }

    public function control_encuesta() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }
}
