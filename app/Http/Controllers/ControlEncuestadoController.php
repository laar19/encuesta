<?php

namespace App\Http\Controllers;

use App\control_encuestado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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

        $cedula = $request->input('cedula');

        $saime = DB::connection('pgsql2')->table("tsaime")->where('tpers_cedul', '=', $cedula)->get();

        if($saime->count() == 0) {
            return "LA CÉDULA NO EXISTE";
        }
        elseif($saime->count() == 1) {
            return redirect()->route('preguntas', [
                    'cedula'           => $saime[0]->tpers_cedul,
                    'primer_nombre'    => $saime[0]->tpers_pnomb,
                    'segundo_nombre'   => $saime[0]->tpers_snomb,
                    'primer_apellido'  => $saime[0]->tpers_papel,
                    'segundo_apellido' => $saime[0]->tpers_sapel,
                    'fecha_nacimiento' => $saime[0]->tpers_fnaci,
                    'genero'           => $saime[0]->tpers_gener
                ]
            );
        }
        else {
            return "ERROR";
        }
    }
}
