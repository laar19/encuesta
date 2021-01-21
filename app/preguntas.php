<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    protected $table        = 'preguntas';
    protected $primaryKey   = 'id';
    public    $incrementing = false;
    public    $keyType      = 'string';
    
    public function opciones_preguntas() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\opciones_preguntas', 'id_preguntas');
        //return $this->hasOne('App\control_encuestado', 'id_encuestado', 'id');
    }

    public function otras_opciones_preguntas() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\otras_opciones_preguntas', 'id_preguntas');
        //return $this->hasOne('App\control_encuestado', 'id_encuestado', 'id');
    }

    public function respuestas() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\respuestas', 'id_preguntas');
        //return $this->hasOne('App\control_encuestado', 'id_encuestado', 'id');
    }
}
