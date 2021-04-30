<?php

namespace App\Http\Controllers;

use App\preguntas;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use App\opciones_preguntas;
use App\otras_opciones_preguntas;
use App\encuestado;
use App\respuestas;
use App\control_encuesta;
use App\control_encuestado;

class PreguntasController extends Controller
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
        // Obtiene las preguntas de selección simple
        $preguntas_seleccion_simple = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
        // Obtiene las preguntas de selección múltiple
        $preguntas_seleccion_multiple = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
        // Obtiene las preguntas de redacción
        $preguntas_redaccion = json_decode(preguntas::select('id')->where('tipo_pregunta', 3)->get());

        $respuestas_seleccion_simple   = collect(); // Variable que guarda las respuestas de las preguntas de selección simple
        $respuestas_seleccion_multiple = collect(); // Variable que guarda las respuestas de las preguntas de selección múltiple
        $respuestas_redaccion          = collect(); // Variable que guarda las respuestas de las preguntas de selección múltiple

        // Obtiene las respuestas de selección simple
        foreach($preguntas_seleccion_simple as $i) {
            $respuestas_seleccion_simple->put($i->id, $request->input($i->id));
        }

        // Obtiene las respuestas de selección múltiple
        foreach($preguntas_seleccion_multiple as $i) {
            $id_preguntas = $i->id;
            $opciones = json_decode(opciones_preguntas::select('id')->where('id_preguntas', $id_preguntas)->get());

            // Almacena la cantidad de opciones por pregunta
            $numero_opciones = array();
            array_push($numero_opciones, count($opciones));

            // Obtiene la respuesta por cada opción
            foreach($numero_opciones as $j) {
                $aux = collect();
                for($k=0; $k<=$j; $k++) {
                    if($request->input($k.$id_preguntas) != NULL) {
                        $id_opcion = opciones_preguntas::select('id')->where([
                            ['id_preguntas', '=', $id_preguntas],
                            ['numero_opcion', '=', $k],
                            ])->get()[0]->id;
                        $aux->put($id_opcion, $request->input($k.$id_preguntas));
                    }
                }
                $respuestas_seleccion_multiple->put($id_preguntas, $aux);
            }
        }

        // Obtiene las respuestas de redacción
        foreach($preguntas_redaccion as $i) {
            $respuestas_redaccion->put($i->id, $request->input($i->id));
        }

        // Última encuesta abierta
        $id_control_encuesta = control_encuesta::select('id')->where('aperturada', 1)->get()[0]->id;

        // Datos personales
        $datos_personales = collect();
        $datos_personales->put('cedula', $request->input('cedula'));
        $datos_personales->put('primer_nombre', $request->input('primer_nombre'));
        $datos_personales->put('segundo_nombre', $request->input('segundo_nombre'));
        $datos_personales->put('primer_apellido', $request->input('primer_apellido'));
        $datos_personales->put('segundo_apellido', $request->input('segundo_apellido'));
        $datos_personales->put('fecha_nacimiento', $request->input('fecha_nacimiento'));

        // Guarda los datos personales
        $id_encuestado = encuestado::create(json_decode(json_encode($datos_personales), true))->id;

        // Control de los encuestados
        $control_encuestado = collect();
        $control_encuestado->put('cedula_encuestado', $request->input('cedula'));
        $control_encuestado->put('region', $request->input('region'));
        $control_encuestado->put('nivel_instruccion', $request->input('nivel_instruccion'));
        $control_encuestado->put('rango_edad', $request->input('rango_edad'));
        $control_encuestado->put('genero', $request->input('genero'));
        $control_encuestado->put('id_encuestado', $id_encuestado);
        $control_encuestado->put('id_control_encuesta', $id_control_encuesta);
        control_encuestado::create(json_decode(json_encode($control_encuestado), true));

        // Valores repetidos en los datos personales
        $respuestas_seleccion_simple->pull('genero');
        $respuestas_seleccion_simple->pull('rango_edad');
        $respuestas_seleccion_simple->pull('nivel_instruccion');
        $respuestas_seleccion_simple->pull('region');

        // Guarda las respuestas de selección simple
        $keys = $respuestas_seleccion_simple->keys();
        foreach(json_decode(json_encode($keys)) as $i) {
            respuestas::Create([
                'respuesta'           => $respuestas_seleccion_simple[$i],
                'id_preguntas'        => $i,
                'id_encuestado'       => $id_encuestado,
                'id_control_encuesta' => $id_control_encuesta
            ]);
        }

        // Guarda las respuestas de selección múltiple
        $keys = $respuestas_seleccion_multiple->keys();
        foreach(json_decode(json_encode($keys)) as $i) {
            $aux = $respuestas_seleccion_multiple[$i]->keys();
            foreach($aux as $j) {
                respuestas::Create([
                    'opcion'              => $j,
                    'respuesta'           => $respuestas_seleccion_multiple->get($i)->get($j),
                    'id_preguntas'        => $i,
                    'id_encuestado'       => $id_encuestado,
                    'id_control_encuesta' => $id_control_encuesta
                ]);
            }
        }

        // Guarda las respuestas de redacción
        $keys = $respuestas_redaccion->keys();
        foreach(json_decode(json_encode($keys)) as $i) {
            respuestas::Create([
                'respuesta'           => $respuestas_redaccion[$i],
                'id_preguntas'        => $i,
                'id_encuestado'       => $id_encuestado,
                'id_control_encuesta' => $id_control_encuesta
            ]);
        }

        return redirect()->route('index')->with(['message' => 'Gracias por participar', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(preguntas $preguntas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function edit(preguntas $preguntas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, preguntas $preguntas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy(preguntas $preguntas)
    {
        //
    }

    public function preguntas($cedula, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $genero)
    {
        // Verifica si existe alguna encuesta aperturada para direccionar al usuario
        $encuesta_aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();

        if (count($encuesta_aperturada) == 0) {
            return redirect()->route('closed');
        }
        
        $saime = collect();
        $saime->put('cedula', $cedula);
        $saime->put('primer_nombre', $primer_nombre);
        $saime->put('segundo_nombre', $segundo_nombre);
        $saime->put('primer_apellido', $primer_apellido);
        $saime->put('segundo_apellido', $segundo_apellido);
        $saime->put('fecha_nacimiento', $fecha_nacimiento);
        $saime->put('genero', $genero);
        
        $datas = collect();
        
        $datas->put('saime', $saime);

        $datas->put('nivel_instruccion', opciones_preguntas::where('id_preguntas', 'nivel_instruccion')->get());
        $datas->put('region', opciones_preguntas::where('id_preguntas', 'region')->get());

        /* PREGUNTA 1 */
        $datas->put('pregunta1', preguntas::select('id', 'pregunta')->where('id', 'pregunta1')->get());
        $datas->put('opciones1', opciones_preguntas::where('id_preguntas', 'pregunta1')->get());
        $datas->put('otras_opciones1', otras_opciones_preguntas::where('id_preguntas', 'pregunta1')->get());

        /* PREGUNTA 2 */
        $datas->put('pregunta2', preguntas::select('id', 'pregunta')->where('id', 'pregunta2')->get());
        $datas->put('opciones2', opciones_preguntas::where('id_preguntas', 'pregunta2')->get());

        /* PREGUNTA 3 */
        $datas->put('pregunta3', preguntas::select('id', 'pregunta')->where('id', 'pregunta3')->get());
        $datas->put('opciones3', opciones_preguntas::where('id_preguntas', 'pregunta3')->get());

        /* PREGUNTA 4 */
        $datas->put('pregunta4', preguntas::select('id', 'pregunta')->where('id', 'pregunta4')->get());
        $datas->put('opciones4', opciones_preguntas::where('id_preguntas', 'pregunta4')->get());

        /* PREGUNTA 5 */
        $datas->put('pregunta5', preguntas::select('id', 'pregunta')->where('id', 'pregunta5')->get());
        $datas->put('opciones5', opciones_preguntas::where('id_preguntas', 'pregunta5')->get());

        /* PREGUNTA 6 */
        $datas->put('pregunta6', preguntas::select('id', 'pregunta')->where('id', 'pregunta6')->get());
        $datas->put('opciones6', opciones_preguntas::where('id_preguntas', 'pregunta6')->get());

        /* PREGUNTA 7 */
        $datas->put('pregunta7', preguntas::select('id', 'pregunta')->where('id', 'pregunta7')->get());
        $datas->put('opciones7', opciones_preguntas::where('id_preguntas', 'pregunta7')->get());

        /* PREGUNTA 8 */
        $datas->put('pregunta8', preguntas::select('id', 'pregunta')->where('id', 'pregunta8')->get());
        $datas->put('opciones8', opciones_preguntas::where('id_preguntas', 'pregunta8')->get());

        /* PREGUNTA 9 */
        $datas->put('pregunta9', preguntas::select('id', 'pregunta')->where('id', 'pregunta9')->get());
        $datas->put('opciones9', opciones_preguntas::where('id_preguntas', 'pregunta9')->get());

        /* PREGUNTA 10 */
        $datas->put('pregunta10', preguntas::select('id', 'pregunta')->where('id', 'pregunta10')->get());
        $datas->put('opciones10', opciones_preguntas::where('id_preguntas', 'pregunta10')->get());

        /* PREGUNTA 11 */
        $datas->put('pregunta11', preguntas::select('id', 'pregunta')->where('id', 'pregunta11')->get());
        $datas->put('opciones11', opciones_preguntas::where('id_preguntas', 'pregunta11')->get());
        $datas->put('otras_opciones11', otras_opciones_preguntas::where('id_preguntas', 'pregunta11')->get());

        /* PREGUNTA 12 */
        $datas->put('pregunta12', preguntas::select('id', 'pregunta')->where('id', 'pregunta12')->get());
        $datas->put('opciones12', opciones_preguntas::where('id_preguntas', 'pregunta12')->get());

        /* PREGUNTA 13 */
        $datas->put('pregunta13', preguntas::select('id', 'pregunta')->where('id', 'pregunta13')->get());
        $datas->put('opciones13', opciones_preguntas::where('id_preguntas', 'pregunta13')->get());

        /* PREGUNTA 14 */
        $datas->put('pregunta14', preguntas::select('id', 'pregunta')->where('id', 'pregunta14')->get());
        $datas->put('opciones14',  opciones_preguntas::where('id_preguntas', 'pregunta14')->get());

        /* PREGUNTA 15 */
        $datas->put('pregunta15', preguntas::select('id', 'pregunta')->where('id', 'pregunta15')->get());
        $datas->put('opciones15', opciones_preguntas::where('id_preguntas', 'pregunta15')->get());

        /* PREGUNTA 16 */
        $datas->put('pregunta16', preguntas::select('id', 'pregunta')->where('id', 'pregunta16')->get());
        $datas->put('opciones16', opciones_preguntas::where('id_preguntas', 'pregunta16')->get());

        /* PREGUNTA 17 */
        $datas->put('pregunta17', preguntas::select('id', 'pregunta')->where('id', 'pregunta17')->get());
        $datas->put('opciones17', opciones_preguntas::where('id_preguntas', 'pregunta17')->get());

        /* PREGUNTA 18 */
        $datas->put('pregunta18', preguntas::select('id', 'pregunta')->where('id', 'pregunta18')->get());
        $datas->put('opciones18', opciones_preguntas::where('id_preguntas', 'pregunta18')->get());

        /* PREGUNTA 19 */
        $datas->put('pregunta19', preguntas::select('id', 'pregunta')->where('id', 'pregunta19')->get());
        $datas->put('opciones19', opciones_preguntas::where('id_preguntas', 'pregunta19')->get());

        /* PREGUNTA 20 */
        $datas->put('pregunta20', preguntas::select('id', 'pregunta')->where('id', 'pregunta20')->get());
        $datas->put('opciones20', opciones_preguntas::where('id_preguntas', 'pregunta20')->get());

        /* PREGUNTA 21 */
        $datas->put('pregunta21', preguntas::select('id', 'pregunta')->where('id', 'pregunta21')->get());
        $datas->put('opciones21', opciones_preguntas::where('id_preguntas', 'pregunta21')->get());

        /* PREGUNTA 22 */
        $datas->put('pregunta22', preguntas::select('id', 'pregunta')->where('id', 'pregunta22')->get());
        $datas->put('opciones22', opciones_preguntas::where('id_preguntas', 'pregunta22')->get());

        /* PREGUNTA 23 */
        $datas->put('pregunta23', preguntas::select('id', 'pregunta')->where('id', 'pregunta23')->get());
        $datas->put('opciones23', opciones_preguntas::where('id_preguntas', 'pregunta23')->get());

        /* PREGUNTA 24 */
        $datas->put('pregunta24', preguntas::select('id', 'pregunta')->where('id', 'pregunta24')->get());
        $datas->put('opciones24', opciones_preguntas::where('id_preguntas', 'pregunta24')->get());

        /* PREGUNTA 25 */
        $datas->put('pregunta25', preguntas::select('id', 'pregunta')->where('id', 'pregunta25')->get());
        
        return view('cuestionario')->with('datas', $datas);
    }
}
