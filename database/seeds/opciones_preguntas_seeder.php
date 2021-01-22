<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\opciones_preguntas;

class opciones_preguntas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* GÉNERO */
        opciones_preguntas::create([
            'opcion'        => 'Masculino',
            'numero_opcion' => '1',
            'id_preguntas'  => 'genero'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Femenino',
            'numero_opcion' => '2',
            'id_preguntas'  => 'genero'
        ]);

        /* RANGO DE EDADES */
        opciones_preguntas::create([
            'opcion'        => '<=18 años',
            'numero_opcion' => '1',
            'id_preguntas'  => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion'        => '>18 y <=30 años',
            'numero_opcion' => '2',
            'id_preguntas'  => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion'        => '>30 y <=50 años',
            'numero_opcion' => '3',
            'id_preguntas'  => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion'        => '>50 años',
            'numero_opcion' => '4',
            'id_preguntas'  => 'rango_edad'
        ]);

        /* NIVEL DE INSTRUCCIÓN */
        opciones_preguntas::create([
            'opcion'        => 'Primaria',
            'numero_opcion' => '1',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Secundaria',
            'numero_opcion' => '2',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Estudios universitarios sin concluir',
            'numero_opcion' => '3',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Graduado universitario',
            'numero_opcion' => '4',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Estudios de postgrado sin concluir',
            'numero_opcion' => '5',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Graduado de postgrado',
            'numero_opcion' => '6',
            'id_preguntas'  => 'nivel_instruccion'
        ]);

        /* ESTADOS DE VENEZUELA */
        opciones_preguntas::create([
            'opcion'        => 'Amazonas',
            'numero_opcion' => '1',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Anzoátegui',
            'numero_opcion' => '2',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Apure',
            'numero_opcion' => '3',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Aragua',
            'numero_opcion' => '4',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Barinas',
            'numero_opcion' => '5',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Bolívar',
            'numero_opcion' => '6',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Carabobo',
            'numero_opcion' => '7',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Cojedes',
            'numero_opcion' => '8',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Delta Amacuro',
            'numero_opcion' => '9',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Distrito Capital',
            'numero_opcion' => '10',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Falcón',
            'numero_opcion' => '11',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Guárico',
            'numero_opcion' => '12',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Lara',
            'numero_opcion' => '13',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La Guaira',
            'numero_opcion' => '14',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Mérida',
            'numero_opcion' => '15',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Miranda',
            'numero_opcion' => '16',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Monagas',
            'numero_opcion' => '17',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Nueva Esparta',
            'numero_opcion' => '18',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Portuguesa',
            'numero_opcion' => '19',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Sucre',
            'numero_opcion' => '20',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Táchira',
            'numero_opcion' => '21',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Trujillo',
            'numero_opcion' => '22',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Yaracuy',
            'numero_opcion' => '23',
            'id_preguntas'  => 'region'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Zulia',
            'numero_opcion' => '24',
            'id_preguntas'  => 'region'
        ]);

        /* PREGUNTAS */

        /* PREGUNTA 1 */
        opciones_preguntas::create([
            'opcion'        => 'Deporte',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Astronomía',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Medicina',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Política',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Exploración espacial',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Física',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Lanzamiento de cohetes',
            'numero_opcion' => '7',
            'id_preguntas'  => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Bajo',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Muy bajo',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Alto',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Muy alto',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No recibió educación científica, ni técnica',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No sabe',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Dominar un lenguaje de programación',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Capacidad para resolver problemas complejos',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Habilidades para el diseño y construcción de robots',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Incentivar la curiosidad por la ciencia y la tecnología',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'El hábito por la lectura',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Un servicio',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Un bien',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Una herramienta',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Un área del conocimiento',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No sabe',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Estudiar a los seres vivos',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Estudiar, investigar e interpretar el espacio exterior',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Contribuir con el desarrollo del país',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Ninguna de las anteriores',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La vida cotidiana',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'El trabajo',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La comprensión del espacio exterior para el mejoramiento de la humanidad',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Preservar el entorno y el ambiente',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Seguridad y defensa de la nación',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Ninguna de las anteriores',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'El Gobierno',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La sociedad',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La industria militar',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Las empresas privadas',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Todas las anteriores',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta8'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta8'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta9'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta9'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta10'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta10'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'MPPCT',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'IVIC',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'ABAE',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'IDEA',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'CIDA',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'FII',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'CIAE',
            'numero_opcion' => '7',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'DIDA',
            'numero_opcion' => '8',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'CENDITEL',
            'numero_opcion' => '9',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'CENDIT',
            'numero_opcion' => '10',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'CNTQ',
            'numero_opcion' => '11',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'INTEVEP',
            'numero_opcion' => '12',
            'id_preguntas'  => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Poca inversión en el área',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Carencia de científicos e ingenieros en el área',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La sociedad venezolana no está interesada en el tema espacial',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No se realiza investigación científica en el tema espacial',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No existe la infraestructura necesaria',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Las empresas privadas no apoyan la investigación en el área espacial',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'El bloqueo unilateral de los EE.UU',
            'numero_opcion' => '7',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'La crisis económica',
            'numero_opcion' => '8',
            'id_preguntas'  => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta13'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta13'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta14'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta14'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Astronomía',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Ingeniería aeroespacial',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Puesta en órbita de satélites',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Exploración espacial',
            'numero_opcion' => '4',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Vuelos espaciales tripulados y no tripulados',
            'numero_opcion' => '5',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Observación de la Tierra',
            'numero_opcion' => '6',
            'id_preguntas'  => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Informado',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Algo informado',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Nada Informado',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta17'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta17'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Positivos',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Negativos',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Ninguna de las anteriores',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta19'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta19'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No sabe',
            'numero_opcion' => '3',
            'id_preguntas'  => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta21'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta21'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta22'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta22'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta23'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta23'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'Si',
            'numero_opcion' => '1',
            'id_preguntas'  => 'pregunta24'
        ]);

        opciones_preguntas::create([
            'opcion'        => 'No',
            'numero_opcion' => '2',
            'id_preguntas'  => 'pregunta24'
        ]);
    }
}
