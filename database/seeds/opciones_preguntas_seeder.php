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
            'opcion'       => 'Masculino',
            'id_preguntas' => 'genero'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Femenino',
            'id_preguntas' => 'genero'
        ]);

        /* RANGO DE EDADES */
        opciones_preguntas::create([
            'opcion' => '<=18 años',
            'id_preguntas' => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion' => '>18 y <=30 años',
            'id_preguntas' => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion' => '>30 y <=50 años',
            'id_preguntas' => 'rango_edad'
        ]);

        opciones_preguntas::create([
            'opcion' => '>50 años',
            'id_preguntas' => 'rango_edad'
        ]);

        /* NIVEL DE INSTRUCCIÓN */
        opciones_preguntas::create([
            'opcion' => 'Primaria',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Secundaria',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Estudios universitarios sin concluir',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Graduado universitario',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Estudios de postgrado sin concluir',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Graduado de postgrado',
            'id_preguntas' => 'nivel_instruccion'
        ]);

        /* ESTADOS DE VENEZUELA */
        opciones_preguntas::create([
            'opcion' => 'Amazonas'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Anzoátegui'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Apure'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Aragua'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Barinas'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Bolívar'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Carabobo'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Cojedes'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Delta Amacuro'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Distrito Capital'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Falcón'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Guárico'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Lara'
        ]);

        opciones_preguntas::create([
            'opcion' => 'La Guaira'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Mérida'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Miranda'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Monagas'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Nueva Esparta'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Portuguesa'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Sucre'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Táchira'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Trujillo'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Yaracuy'
        ]);

        opciones_preguntas::create([
            'opcion' => 'Zulia'
        ]);

        /* PREGUNTAS */
        opciones_preguntas::create([
            'opcion'       => 'Deporte',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Astronomía',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Medicina',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Política',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Exploración espacial',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Física',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Lanzamiento de cohetes',
            'id_preguntas' => 'pregunta1'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Bajo',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Muy bajo',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Alto',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Muy alto',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No recibió educación científica, ni técnica',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No sabe',
            'id_preguntas' => 'pregunta2'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Dominar un lenguaje de programación',
            'id_preguntas' => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Capacidad para resolver problemas complejos',
            'id_preguntas' => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Habilidades para el diseño y construcción de robots',
            'id_preguntas' => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Incentivar la curiosidad por la ciencia y la tecnología',
            'id_preguntas' => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'El hábito por la lectura',
            'id_preguntas' => 'pregunta3'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Un servicio',
            'id_preguntas' => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Un bien',
            'id_preguntas' => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Una herramienta',
            'id_preguntas' => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Un área del conocimiento',
            'id_preguntas' => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No sabe',
            'id_preguntas' => 'pregunta4'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Estudiar a los seres vivos',
            'id_preguntas' => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Estudiar, investigar e interpretar el espacio exterior',
            'id_preguntas' => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Contribuir con el desarrollo del país',
            'id_preguntas' => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Ninguna de las anteriores',
            'id_preguntas' => 'pregunta5'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La vida cotidiana',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'El trabajo',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La comprensión del espacio exterior para el mejoramiento de la humanidad',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Preservar el entorno y el ambiente',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Seguridad y defensa de la nación',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Ninguna de las anteriores',
            'id_preguntas' => 'pregunta6'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'El Gobierno',
            'id_preguntas' => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La sociedad',
            'id_preguntas' => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La industria militar',
            'id_preguntas' => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Las empresas privadas',
            'id_preguntas' => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Todas las anteriores',
            'id_preguntas' => 'pregunta7'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta8'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta8'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta9'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta9'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta10'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta10'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'MPPCT',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'IVIC',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'ABAE',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'IDEA',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'CIDA',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'FII',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'CIAE',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'DIDA',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'CENDITEL',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'CENDIT',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'CNTQ',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'INTEVEP',
            'id_preguntas' => 'pregunta11'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Poca inversión en el área',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Carencia de científicos e ingenieros en el área',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La sociedad venezolana no está interesada en el tema espacial',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No se realiza investigación científica en el tema espacial',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No existe la infraestructura necesaria',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Las empresas privadas no apoyan la investigación en el área espacial',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'El bloqueo unilateral de los EE.UU',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'La crisis económica',
            'id_preguntas' => 'pregunta12'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta13'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta13'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta14'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta14'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Astronomía',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Ingeniería aeroespacial',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Puesta en órbita de satélites',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Exploración espacial',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Vuelos espaciales tripulados y no tripulados',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Observación de la Tierra',
            'id_preguntas' => 'pregunta15'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Informado',
            'id_preguntas' => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Algo informado',
            'id_preguntas' => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Nada Informado',
            'id_preguntas' => 'pregunta16'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta17'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta17'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Positivos',
            'id_preguntas' => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Negativos',
            'id_preguntas' => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Ninguna de las anteriores',
            'id_preguntas' => 'pregunta18'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta19'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta19'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No sabe',
            'id_preguntas' => 'pregunta20'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta21'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta21'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta22'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta22'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta23'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta23'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'Si',
            'id_preguntas' => 'pregunta24'
        ]);

        opciones_preguntas::create([
            'opcion'       => 'No',
            'id_preguntas' => 'pregunta24'
        ]);
    }
}
