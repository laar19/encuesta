<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    protected $fillable = [
        'respuesta',
        'opcion',
        'id_preguntas',
        'id_encuestado',
        'id_control_encuesta'
    ];
    
    public function preguntas() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\preguntas', 'id_preguntas');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }

    public function encuestado() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\encuestado', 'id_encuestado');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }

    public function control_encuesta() {
        //return $this->belongsTo('App\Control_encuesta');
        return $this->belongsTo('App\control_encuesta', 'id_control_encuesta');
        //return $this->belongsTo('App\Control_encuesta', 'id_control_encuesta', 'id');
    }
}
