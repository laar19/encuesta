<?php

namespace App\Http\Controllers;

use App\control_encuestado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\control_encuesta;
use App\encuestado;

class ControlEncuestadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\control_encuestado  $control_encuestado
     * @return \Illuminate\Http\Response
     */
    public function show(control_encuestado $control_encuestado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\control_encuestado  $control_encuestado
     * @return \Illuminate\Http\Response
     */
    public function edit(control_encuestado $control_encuestado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\control_encuestado  $control_encuestado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, control_encuestado $control_encuestado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\control_encuestado  $control_encuestado
     * @return \Illuminate\Http\Response
     */
    public function destroy(control_encuestado $control_encuestado)
    {
        //
    }

    public function verificacion(Request $request)
    {
        // Verifica si existe alguna encuesta aperturada para direccionar al usuario
        $encuesta_aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();

        if (count($encuesta_aperturada) == 0) {
            return redirect()->route('closed');
        }

        // Obtiene la cédula
        $cedula = $request->input('cedula');

        if(!is_numeric($cedula)) {
            return redirect()->route('index')->with(['message' => 'Error fatal', 'alert' => 'alert-danger']);
        }
        
        if($cedula[0] == 0) {
            return redirect()->route('index')->with(['message' => 'Error fatal', 'alert' => 'alert-danger']);
        }

        // Verifica si la cédula existe en la BD del saime
        $saime = DB::connection('second')->table("tsaime")->where('tpers_cedul', '=', $cedula)->get();

        // Si no existe
        if($saime->count() == 0) {
            return view('registro', [
                'cedula' => $cedula
            ]);
        }
        // Si existe
        elseif($saime->count() == 1) {
            // Obtiene la única encuesta aperturada
            $id_control_encuesta = control_encuesta::select('id')->where('aperturada', 1)->get();

            // Coteja si el encuestado respondió la encuesta aperturada
            $control_encuestados = control_encuestado::select('id')->where([
                ['cedula_encuestado', '=', $saime[0]->tpers_cedul],
                ['id_control_encuesta', '=', $id_control_encuesta[0]->id],
            ])->get();

            // Si ya la respondió
            if(count($control_encuestados) > 0) {
                return redirect()->back()->with(['message' => 'Usted ya respondió esta encuesta', 'alert' => 'alert-danger']);
            }
            // Si no la ha respondido
            else {
                // En caso de no poseer segundo nombre ni segundo apellido se rellena con vacío
                if($saime[0]->tpers_snomb == NULL) {
                    $saime[0]->tpers_snomb = " ";
                }
                if($saime[0]->tpers_sapel == NULL) {
                    $saime[0]->tpers_sapel = " ";
                }
                
                return redirect()->route('preguntas', [
                    'cedula'           => $saime[0]->tpers_cedul,
                    'primer_nombre'    => $saime[0]->tpers_pnomb,
                    'segundo_nombre'   => $saime[0]->tpers_snomb,
                    'primer_apellido'  => $saime[0]->tpers_papel,
                    'segundo_apellido' => $saime[0]->tpers_sapel,
                    'fecha_nacimiento' => $saime[0]->tpers_fnaci,
                    'genero'           => $saime[0]->tpers_gener
                ]);
            }
        }
        else {
            return redirect()->route('index')->with(['message' => 'Error', 'alert' => 'alert-danger']);
        }
    }

    public function registro(Request $request)
    {
        // Verifica si existe alguna encuesta aperturada para direccionar al usuario
        $encuesta_aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();

        if (count($encuesta_aperturada) == 0) {
            return redirect()->route('closed');
        }
        
        // Validate inputs
        $columns        = json_decode(json_encode(encuestado::find(1)), true);
        $inputs         = $request->input();
        $exclude_inputs = ['_token', 'genero'];
        $route          = 'index';
        $message        = 'Error fatal';
        $alert_type     = 'alert-danger';
        check_requests_input($exclude_inputs, $inputs, $columns, $route, $message, $alert_type);

        // Except arbitrary null values
        $except = array('segundo_nombre', 'segundo_apellido');
        foreach($except as $i) {
            if($inputs[$i] == NULL) {
                $inputs[$i] = ' ';
            }
        }

        // Any other null value is not accepted
        foreach($inputs as $i) {
            if($i == NULL) {
                return redirect()->route('index')->with(['message' => 'Ningún campo debe quedar vacío', 'alert' => 'alert-danger']);
            }
        }
        
        // Verifica si la cédula existe en la BD
        $row = json_decode(encuestado::select('cedula')->where('cedula', $inputs['cedula'])->get());

        // Si existe
        if(count($row) > 0) {
            return redirect()->route('index')->with(['message' => 'Usted ya respondió esta encuesta', 'alert' => 'alert-danger']);
        }

        $inputs['_token'] = NULL; // Remove _token value from url bar
        return redirect()->route('preguntas', $inputs);
    }
}
