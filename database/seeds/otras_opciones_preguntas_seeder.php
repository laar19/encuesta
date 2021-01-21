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
            'opcion' => 'Muy científica',
            'id_preguntas' => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'Nada científica',
            'id_preguntas' => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'Poco científica',
            'id_preguntas' => 'pregunta1'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'Mucho',
            'id_preguntas' => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'Algo',
            'id_preguntas' => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'Poco',
            'id_preguntas' => 'pregunta11'
        ]);

        otras_opciones_preguntas::create([
            'opcion' => 'No conoce',
            'id_preguntas' => 'pregunta11'
        ]);
    }
}
