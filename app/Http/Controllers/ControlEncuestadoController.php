<?php

namespace App\Http\Controllers;

use App\control_encuestado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\control_encuesta;

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

        // Obtiene la cédula
        $cedula = $request->input('cedula');

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
            return "ERROR";
        }
    }

    public function registro(Request $request)
    {        
        // En caso de no poseer segundo nombre ni segundo apellido se rellena con vacío
        $segundo_nombre   = $request->input('segundo_nombre');
        $segundo_apellido = $request->input('segundo_apellido');
        
        if($segundo_nombre == NULL) {
            $segundo_nombre = " ";
        }
        if($segundo_apellido == NULL) {
            $segundo_apellido = " ";
        }
        
        return redirect()->route('preguntas', [
            'cedula'           => $request->input('ci'),
            'primer_nombre'    => $request->input('primer_nombre'),
            'segundo_nombre'   => $segundo_nombre,
            'primer_apellido'  => $request->input('primer_apellido'),
            'segundo_apellido' => $segundo_apellido,
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'genero'           => $request->input('genero')
        ]);
    }
}
