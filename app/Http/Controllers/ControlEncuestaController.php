<?php

namespace App\Http\Controllers;

use App\control_encuesta;
use Illuminate\Http\Request;

use Auth;

class ControlEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset(Auth::user()->email)) {
            return view('login.index');
        }
        
        $data = control_encuesta::select('fecha_apertura', 'fecha_cierre')->where('aperturada', 1)->get();
        
        return view('admin.index')->with('data', $data);
    }
    
    public function open()
    {
        if(!isset(Auth::user()->email)) {
            return view('login.index');
        }
        
        return view('admin.open');
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
    public function store_quest(Request $request)
    {
        // Apertura una nueva encuesta, si ya hay una aperturada devuelve error
        $aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();
        if(count($aperturada) == 1) {
            return redirect()->back()->with(['message' => 'Ya existe una encuesta aperturada. No puede aperturar otra, debe finalizar la primera', 'alert' => 'alert-danger']);
        }
        else {
            $control_encuesta = collect();
            $control_encuesta->put('fecha_apertura', $request->input('fecha_apertura'));
            $control_encuesta->put('fecha_cierre', $request->input('fecha_cierre'));
            $control_encuesta->put('aperturada', 1);
            control_encuesta::create(json_decode(json_encode($control_encuesta), true));
            
            return redirect()->back()->with(['message' => 'Encuesta aperturada con éxito', 'alert' => 'alert-success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_encuesta $control_encuesta)
    {
        //
    }

    public function close_quest()
    {
        // Cierra la encuesta aperturada
        $id_aperturada = control_encuesta::select('id')->where('aperturada', 1);
        if(count($id_aperturada) == 0) {
            return 'No hay encuesta aperturada para cerrar';
        }
        else {
            $control_encuesta = control_encuesta::find($id_aperturada->get()[0]->id);
            $control_encuesta->aperturada = 0;
            $control_encuesta->save();
            
            return 'La encuesta se ha cerrado';
        }
    }
}
