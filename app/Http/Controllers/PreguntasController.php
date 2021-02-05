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

class PreguntasController extends Controller
{
    private $ids_preguntas;

    public function __construct()
    {
        $this->ids_preguntas = collect();
    }
    
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
        // Obteniendo las respuestas dinámicamente
        $preguntas = json_decode(preguntas::select('id')->get());

        $respuestas_seleccion_simple  = collect(); // Respuestas de las preguntas de selección simple
        $preguntas_seleccion_multiple = collect(); // Preguntas de selección múltiple
        
        foreach($preguntas as $i) {
            if($request->input($i->id) !== NULL) {
                $respuestas_seleccion_simple->put($i->id, $request->input($i->id));
            }
            else {
                $preguntas_seleccion_multiple->put($i->id, $i->id);
            }
        }

        $respuestas_seleccion_multiple = collect();
        foreach($preguntas_seleccion_multiple as $i) {
            $aux = json_decode(opciones_preguntas::select('id')->where('id_preguntas', $i)->get());
            $id_preguntas = $i;

            $aux2 = array();
            array_push($aux2, count($aux));
            
            foreach($aux2 as $j) {
                $aux3 = collect();
                for($k=0; $k<=$j; $k++) {
                    if($request->input($k.$id_preguntas) != NULL) {
                        //$id_opcion = opciones_preguntas::select('id')->where('id_preguntas', $id_preguntas)->get());
                        $id_opcion = json_decode(opciones_preguntas::select('id')->where([
                            ['id_preguntas', '=', $id_preguntas],
                            ['numero_opcion', '=', $k],
                            ])->get());
                        //print_r($id_preguntas);
                        //echo '<br><br>';
                        //print_r($id_opcion[0]->id);
                        //$aux3->put($k, $request->input($k.$id_preguntas));
                        $aux3->put($id_opcion[0]->id, $request->input($k.$id_preguntas));
                    }
                }
                $respuestas_seleccion_multiple->put($id_preguntas, $aux3);
            }
        }

        //print_r($respuestas_seleccion_multiple->all());

        // Datos personales
        $datos_personales = collect();
        $datos_personales->put('cedula', $request->input('cedula'));
        $datos_personales->put('primer_nombre', $request->input('primer_nombre'));
        $datos_personales->put('segundo_nombre', $request->input('segundo_nombre'));
        $datos_personales->put('primer_apellido', $request->input('primer_apellido'));
        $datos_personales->put('segundo_apellido', $request->input('segundo_apellido'));
        $datos_personales->put('fecha_nacimiento', $request->input('fecha_nacimiento'));
        $datos_personales->put('genero', $request->input('genero'));
        $datos_personales->put('nivel_instruccion', $request->input('nivel_instruccion'));
        $datos_personales->put('region', $request->input('region'));

        $id_encuestado = encuestado::create(json_decode(json_encode($datos_personales), true))->id;

        $respuestas_seleccion_simple->pull('genero');
        $respuestas_seleccion_simple->pull('rango_edad');
        $respuestas_seleccion_simple->pull('nivel_instruccion');
        $respuestas_seleccion_simple->pull('region');
        $keys = $respuestas_seleccion_simple->keys();

        foreach(json_decode(json_encode($keys)) as $i) {
            respuestas::Create([
                'respuesta' => $datos_personales[$i],
                'id_preguntas' => $i,
                'id_encuestado' => $id_encuestado,
            ]);
        }
        
        //return redirect()->back()->with('success', 'Datos guardados correctamente');
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
