<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\control_encuesta;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // Verifica si existe alguna encuesta aperturada para direccionar al usuario
        $encuesta_aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();

        if (count($encuesta_aperturada) == 1) {
            return view('index');
        }
        else {
            return 'ERROR. NO HAY ENCUESTA';
        }
    }
}
