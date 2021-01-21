<?php

namespace App\Http\Controllers;

use App\encuesta_principal;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

use App\referencia_nivel_instruccion;
use App\referencia_estados_de_venezuela;
use App\referencia_actividades_cientificas;
use App\referencia_nivel_educ_cientifica_tec_recibido;
use App\referencia_comp_habi_sis_educ_jovenes;
use App\referencia_defina_ciencia_tecnologia_espacial;
use App\referencia_cual_considera_objetivo_ciencia_espacial;
use App\referencia_conoci_cientifico_tecnologico_espacial_util;
use App\referencia_desarrollo_ciencia_tecno_espacial_servicio_de;
use App\referencia_considera_ven_investiga_espacio;
use App\referencia_estudio_espacial_contribuye_desarrollo_productivo;
use App\referencia_conoce_abae;

class EncuestaPrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        if(!isset(Auth::user()->email)) {
            return view('login.login');
        }
        */

        //return view('cuestionario');
        /*
        $referencia_nivel_instruccions = DB::select('SELECT id, descripcion FROM referencia_nivel_instruccions');
        $referencia_estados_de_venezuelas = DB::select('SELECT id, nombre_estado FROM referencia_estados_de_venezuelas');
        $referencia_actividades_cientificas = DB::select('SELECT id, descripcion FROM referencia_actividades_cientificas');
        $referencia_nivel_educ_cientifica_tec_recibidos = DB::select('SELECT id, descripcion FROM referencia_nivel_educ_cientifica_tec_recibidos');
        $referencia_comp_habi_sis_educ_jovenes = DB::select('SELECT id, descripcion FROM referencia_comp_habi_sis_educ_jovenes');
        $referencia_defina_ciencia_tecnologia_espacials = DB::select('SELECT id, descripcion FROM referencia_defina_ciencia_tecnologia_espacials');
        $referencia_cual_considera_objetivo_ciencia_espacials = DB::select('SELECT id, descripcion FROM referencia_cual_considera_objetivo_ciencia_espacials');
        */

        $referencia_nivel_instruccion = referencia_nivel_instruccion::all('id', 'descripcion');
        
        $referencia_estados_de_venezuela = referencia_estados_de_venezuela::all('id', 'nombre_estado');
        
        $referencia_actividades_cientificas = referencia_actividades_cientificas::all('id', 'descripcion');
        
        $referencia_nivel_educ_cientifica_tec_recibido = referencia_nivel_educ_cientifica_tec_recibido::all('id', 'descripcion');
        
        $referencia_comp_habi_sis_educ_jovenes = referencia_comp_habi_sis_educ_jovenes::all('id', 'descripcion');
        
        $referencia_defina_ciencia_tecnologia_espacial = referencia_defina_ciencia_tecnologia_espacial::all('id', 'descripcion');
        
        $referencia_cual_considera_objetivo_ciencia_espacial = referencia_cual_considera_objetivo_ciencia_espacial::all('id', 'descripcion');

        $referencia_conoci_cientifico_tecnologico_espacial_util = referencia_conoci_cientifico_tecnologico_espacial_util::all('id', 'descripcion');

        $referencia_desarrollo_ciencia_tecno_espacial_servicio_de = referencia_desarrollo_ciencia_tecno_espacial_servicio_de::all('id', 'descripcion');

        $referencia_considera_ven_investiga_espacio = referencia_considera_ven_investiga_espacio::all('id', 'descripcion');

        $referencia_estudio_espacial_contribuye_desarrollo_productivo = referencia_estudio_espacial_contribuye_desarrollo_productivo::all('id', 'descripcion');

        $referencia_conoce_abae = referencia_conoce_abae::all('id', 'descripcion');

        $datas = collect([
            'referencia_nivel_instruccion' => $referencia_nivel_instruccion,
            'referencia_estados_de_venezuela' => $referencia_estados_de_venezuela,
            'referencia_actividades_cientificas' => $referencia_actividades_cientificas,
            'referencia_nivel_educ_cientifica_tec_recibido' => $referencia_nivel_educ_cientifica_tec_recibido,
            'referencia_comp_habi_sis_educ_jovenes' => $referencia_comp_habi_sis_educ_jovenes,
            'referencia_defina_ciencia_tecnologia_espacial' => $referencia_defina_ciencia_tecnologia_espacial,
            'referencia_cual_considera_objetivo_ciencia_espacial' => $referencia_cual_considera_objetivo_ciencia_espacial,
            'referencia_conoci_cientifico_tecnologico_espacial_util' => $referencia_conoci_cientifico_tecnologico_espacial_util,
            'referencia_desarrollo_ciencia_tecno_espacial_servicio_de' => $referencia_desarrollo_ciencia_tecno_espacial_servicio_de,
            'referencia_considera_ven_investiga_espacio' => $referencia_considera_ven_investiga_espacio,
            'referencia_estudio_espacial_contribuye_desarrollo_productivo' => $referencia_estudio_espacial_contribuye_desarrollo_productivo,
            'referencia_conoce_abae' => $referencia_conoce_abae,
        ]);
        
        return view('cuestionario')->with('datas', $datas);
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
     * @param  \App\encuesta_principal  $encuesta_principal
     * @return \Illuminate\Http\Response
     */
    public function show(encuesta_principal $encuesta_principal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\encuesta_principal  $encuesta_principal
     * @return \Illuminate\Http\Response
     */
    public function edit(encuesta_principal $encuesta_principal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\encuesta_principal  $encuesta_principal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, encuesta_principal $encuesta_principal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\encuesta_principal  $encuesta_principal
     * @return \Illuminate\Http\Response
     */
    public function destroy(encuesta_principal $encuesta_principal)
    {
        //
    }
}
