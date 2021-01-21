<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\preguntas;

class preguntas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        preguntas::create([
            'id' => 'genero',
            'pregunta' => 'Género'
        ]);

        preguntas::create([
            'id' => 'rango_edad',
            'pregunta' => 'Rango de edad'
        ]);

        preguntas::create([
            'id' => 'nivel_instruccion',
            'pregunta' => 'Nivel de instrucción'
        ]);

        preguntas::create([
            'id' => 'region',
            'pregunta' => 'Región'
        ]);

        preguntas::create([
            'id' => 'pregunta1',
            'pregunta' => 'De las siguientes actividades cuáles considera usted son Muy científicas, Nada científicas y Poco científicas:'
        ]);

        preguntas::create([
            'id' => 'pregunta2',
            'pregunta' => 'Según su opinión, usted considera que el nivel de educación científica y técnica que ha recibido es:'
        ]);

        preguntas::create([
            'id' => 'pregunta3',
            'pregunta' => '¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes?. (Seleccione máximo dos)'
        ]);

        preguntas::create([
            'id' => 'pregunta4',
            'pregunta' => '¿Qué es para usted la ciencia y la tecnología espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta5',
            'pregunta' => '¿Cuál considera usted es el principal objetivo de la ciencia espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta6',
            'pregunta' => 'Considera usted que el conocimiento científico y tecnológico en el tema espacial es útil para:'
        ]);

        preguntas::create([
            'id' => 'pregunta7',
            'pregunta' => 'En su opinión, considera usted que el desarrollo de la ciencia y la tecnología espacial deben estar al servicio de:'
        ]);

        preguntas::create([
            'id' => 'pregunta8',
            'pregunta' => '¿Usted considera que en la República Bolivariana de Venezuela se hace investigación en ciencia y tecnología espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta9',
            'pregunta' => '¿Considera usted que en nuestro país el estudio y la investigación en ciencia espacial, puede contribuir al desarrollo de los sectores productivos y económicos de Venezuela?'
        ]);

        preguntas::create([
            'id' => 'pregunta10',
            'pregunta' => '¿Sabe usted si en nuestro país existe un organismo encargado de la gestión y la formulación de políticas públicas respecto al uso del espacio exterior?'
        ]);

        preguntas::create([
            'id' => 'pregunta10.1',
            'pregunta' => '¿Cuál?'
        ]);

        preguntas::create([
            'id' => 'pregunta11',
            'pregunta' => 'Señale para cada uno de los siguientes organismos, si usted conoce, Mucho, Algo, Poco, o No conoce:'
        ]);

        preguntas::create([
            'id' => 'pregunta12',
            'pregunta' => '¿A qué atribuye usted que en nuestro país no exista mayor avance en el tema espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta13',
            'pregunta' => '¿Usted está satisfecho con la información en ciencia y tecnología espacial que se transmite por los diversos medios nacionales?'
        ]);

        preguntas::create([
            'id' => 'pregunta14',
            'pregunta' => '¿Le parece útil que la sociedad venezolana esté más informada sobre el tema espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta15',
            'pregunta' => '¿En qué aspectos de la ciencia espacial usted se interesaría?'
        ]);

        preguntas::create([
            'id' => 'pregunta16',
            'pregunta' => 'Diga si usted está: Muy informado, Algo informado, Nada informado, sobre lo satélites venezolanos en órbita'
        ]);

        preguntas::create([
            'id' => 'pregunta17',
            'pregunta' => '¿Sabía usted que nuestro país tiene en órbita dos satélites de observación remota?'
        ]);

        preguntas::create([
            'id' => 'pregunta18',
            'pregunta' => '¿Usted considera que el satélite Simón Bolívar generó efectos positivos o negativos al país?'
        ]);

        preguntas::create([
            'id' => 'pregunta19',
            'pregunta' => '¿Usted considera pertinente que el Gobierno Nacional promueva la investigación y desarrollo en el tema espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta20',
            'pregunta' => '¿Cree usted que el Gobierno apoya al financiamiento de las actividades científicas y tecnológicas en el área espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta21',
            'pregunta' => 'Si existiera más inversión pública en el tema espacial ¿Cree usted que se fortalecería el avance en ciencia y tecnología espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta22',
            'pregunta' => '¿Considera usted pertinente que en nuestro país se regulen las actividades espaciales?'
        ]);

        preguntas::create([
            'id' => 'pregunta23',
            'pregunta' => 'En su opinión. ¿La creación de un fondo para la recaudación de aportes para financiar proyectos en el área espacial, impulsaría el desarrollo de la ciencia y la tecnología espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta24',
            'pregunta' => 'Así como existe un Plan de la Patria donde se establece la visión a largo plazo del país. ¿Usted considera pertinente que se elabore un plan nacional en materia espacial?'
        ]);

        preguntas::create([
            'id' => 'pregunta25',
            'pregunta' => 'Comentarios o sugerencias para mejorar el instrumento de consulta'
        ]);
    }
}
