<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aspectos_ciencia_espacial_interesaria extends Model
{
    public function encuesta_principal() {
        return $this->belongsTo('App\encuesta_principal');
    }
}
