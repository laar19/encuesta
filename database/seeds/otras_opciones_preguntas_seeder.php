<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\otras_opciones_preguntas;

class otras_opciones_preguntas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        otras_opciones_preguntas::create([
            'opcion'        => 'Muy científica',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'Nada científica',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'Poco científica',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'Mucho',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'Algo',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'Poco',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion'        => 'No conoce',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta11'
        ]);
    }
}
