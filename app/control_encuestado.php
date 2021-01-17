<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class control_encuestado extends Model
{
    public function encuestado() {
        return $this->belongsTo('App\Encuestado');
    }

    public function control_encuesta() {
        return $this->belongsTo('App\Control_encuesta');
    }
}
