<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class a_que_atribuye_poco_avance_tema_espacial extends Model
{
    public function encuesta_principal() {
        //return $this->belongsTo('App\encuesta_principal');
        return $this->belongsTo('App\encuesta_principal', 'id_encuesta_principal');
        //return $this->belongsTo('App\encuesta_principal', 'id_encuesta_principal', 'id');
    }
}
