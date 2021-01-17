<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conoci_cientifico_tecnologico_espacial_util extends Model
{
    public function encuesta_principal() {
        return $this->belongsTo('App\encuesta_principal');
    }
}
