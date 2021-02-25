<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuestado extends Model
{
    protected $fillable = [
        'cedula',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'genero',
        'fecha_nacimiento',
        'region',
        'nivel_instruccion',
    ];
    
    public function control_encuestado() {
        //return $this->hasMany('App\control_encuestado');
        return $this->hasMany('App\control_encuestado', 'id_encuestado');
        //return $this->hasOne('App\control_encuestado', 'id_encuestado', 'id');
    }

    public function respuestas() {
        //return $this->hasMany('App\encuesta_principal');
        return $this->hasMany('App\respuestas', 'id_encuestado');
        //return $this->hasOne('App\encuesta_principal', 'id_encuestado', 'id');
    }
}
