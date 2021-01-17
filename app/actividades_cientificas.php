<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividades_cientificas extends Model
{
    public function encuesta_principal() {
        return $this->belongsTo('App\encuesta_principal');
    }
}
