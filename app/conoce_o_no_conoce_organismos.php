<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conoce_o_no_conoce_organismos extends Model
{
    public function encuesta_principal() {
        return $this->belongsTo('App\encuesta_principal');
    }
}
