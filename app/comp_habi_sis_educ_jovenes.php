<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comp_habi_sis_educ_jovenes extends Model
{
    public function encuesta_principal() {
        return $this->belongsTo('App\encuesta_principal');
    }
}
