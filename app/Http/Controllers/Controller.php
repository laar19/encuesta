<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use App\preguntas;
use App\opciones_preguntas;
use App\otras_opciones_preguntas;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $datas = collect();

        $ci = 000;
        $datas->put('saime', DB::connection('pgsql2')->table("tsaime")->where('tpers_cedul', '=', $ci)->get());

        $datas->put('nivel_instruccion', opciones_preguntas::where('id_preguntas', 'nivel_instruccion')->get());
        $datas->put('region', opciones_preguntas::where('id_preguntas', 'region')->get());

        /* PREGUNTA 1 */
        $datas->put('pregunta1', preguntas::select('pregunta')->where('id', 'pregunta1')->get());
        $datas->put('opciones1', opciones_preguntas::where('id_preguntas', 'pregunta1')->get());
        $datas->put('otras_opciones1', otras_opciones_preguntas::where('id_preguntas', 'pregunta1')->get());

        /* PREGUNTA 2 */
        $datas->put('pregunta2', preguntas::select('pregunta')->where('id', 'pregunta2')->get());
        $datas->put('opciones2', opciones_preguntas::where('id_preguntas', 'pregunta2')->get());

        /* PREGUNTA 3 */
        $datas->put('pregunta3', preguntas::select('pregunta')->where('id', 'pregunta3')->get());
        $datas->put('opciones3', opciones_preguntas::where('id_preguntas', 'pregunta3')->get());

        /* PREGUNTA 4 */
        $datas->put('pregunta4', preguntas::select('pregunta')->where('id', 'pregunta4')->get());
        $datas->put('opciones4', opciones_preguntas::where('id_preguntas', 'pregunta4')->get());

        /* PREGUNTA 5 */
        $datas->put('pregunta5', preguntas::select('pregunta')->where('id', 'pregunta5')->get());
        $datas->put('opciones5', opciones_preguntas::where('id_preguntas', 'pregunta5')->get());

        /* PREGUNTA 6 */
        $datas->put('pregunta6', preguntas::select('pregunta')->where('id', 'pregunta6')->get());
        $datas->put('opciones6', opciones_preguntas::where('id_preguntas', 'pregunta6')->get());

        /* PREGUNTA 7 */
        $datas->put('pregunta7', preguntas::select('pregunta')->where('id', 'pregunta7')->get());
        $datas->put('opciones7', opciones_preguntas::where('id_preguntas', 'pregunta7')->get());

        /* PREGUNTA 8 */
        $datas->put('pregunta8', preguntas::select('pregunta')->where('id', 'pregunta8')->get());
        $datas->put('opciones8', opciones_preguntas::where('id_preguntas', 'pregunta8')->get());

        /* PREGUNTA 9 */
        $datas->put('pregunta9', preguntas::select('pregunta')->where('id', 'pregunta9')->get());
        $datas->put('opciones9', opciones_preguntas::where('id_preguntas', 'pregunta9')->get());

        /* PREGUNTA 10 */
        $datas->put('pregunta10', preguntas::select('pregunta')->where('id', 'pregunta10')->get());
        $datas->put('opciones10', opciones_preguntas::where('id_preguntas', 'pregunta10')->get());

        /* PREGUNTA 11 */
        $datas->put('pregunta11', preguntas::select('pregunta')->where('id', 'pregunta11')->get());
        $datas->put('opciones11', opciones_preguntas::where('id_preguntas', 'pregunta11')->get());
        $datas->put('otras_opciones11', otras_opciones_preguntas::where('id_preguntas', 'pregunta11')->get());

        /* PREGUNTA 12 */
        $datas->put('pregunta12', preguntas::select('pregunta')->where('id', 'pregunta12')->get());
        $datas->put('opciones12', opciones_preguntas::where('id_preguntas', 'pregunta12')->get());

        /* PREGUNTA 13 */
        $datas->put('pregunta13', preguntas::select('pregunta')->where('id', 'pregunta13')->get());
        $datas->put('opciones13', opciones_preguntas::where('id_preguntas', 'pregunta13')->get());

        /* PREGUNTA 14 */
        $datas->put('pregunta14', preguntas::select('pregunta')->where('id', 'pregunta14')->get());
        $datas->put('opciones14',  opciones_preguntas::where('id_preguntas', 'pregunta14')->get());

        /* PREGUNTA 15 */
        $datas->put('pregunta15', preguntas::select('pregunta')->where('id', 'pregunta15')->get());
        $datas->put('opciones15', opciones_preguntas::where('id_preguntas', 'pregunta15')->get());

        /* PREGUNTA 16 */
        $datas->put('pregunta16', preguntas::select('pregunta')->where('id', 'pregunta16')->get());
        $datas->put('opciones16', opciones_preguntas::where('id_preguntas', 'pregunta16')->get());

        /* PREGUNTA 17 */
        $datas->put('pregunta17', preguntas::select('pregunta')->where('id', 'pregunta17')->get());
        $datas->put('opciones17', opciones_preguntas::where('id_preguntas', 'pregunta17')->get());

        /* PREGUNTA 18 */
        $datas->put('pregunta18', preguntas::select('pregunta')->where('id', 'pregunta18')->get());
        $datas->put('opciones18', opciones_preguntas::where('id_preguntas', 'pregunta18')->get());

        /* PREGUNTA 19 */
        $datas->put('pregunta19', preguntas::select('pregunta')->where('id', 'pregunta19')->get());
        $datas->put('opciones19', opciones_preguntas::where('id_preguntas', 'pregunta19')->get());

        /* PREGUNTA 20 */
        $datas->put('pregunta20', preguntas::select('pregunta')->where('id', 'pregunta20')->get());
        $datas->put('opciones20', opciones_preguntas::where('id_preguntas', 'pregunta20')->get());

        /* PREGUNTA 21 */
        $datas->put('pregunta21', preguntas::select('pregunta')->where('id', 'pregunta21')->get());
        $datas->put('opciones21', opciones_preguntas::where('id_preguntas', 'pregunta21')->get());

        /* PREGUNTA 22 */
        $datas->put('pregunta22', preguntas::select('pregunta')->where('id', 'pregunta22')->get());
        $datas->put('opciones22', opciones_preguntas::where('id_preguntas', 'pregunta22')->get());

        /* PREGUNTA 23 */
        $datas->put('pregunta23', preguntas::select('pregunta')->where('id', 'pregunta23')->get());
        $datas->put('opciones23', opciones_preguntas::where('id_preguntas', 'pregunta23')->get());

        /* PREGUNTA 24 */
        $datas->put('pregunta24', preguntas::select('pregunta')->where('id', 'pregunta24')->get());
        $datas->put('opciones24', opciones_preguntas::where('id_preguntas', 'pregunta24')->get());

        /* PREGUNTA 25 */
        $datas->put('pregunta25', preguntas::select('pregunta')->where('id', 'pregunta25')->get());
        
        return view('cuestionario')->with('datas', $datas);
    }
}
