<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaPrincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta_principals', function (Blueprint $table) {
            $table->id();
            
            $table->integer('nivel_educ_cientifica_tec_recibido')->comment('Pregunta #2. Según su opinión, usted considera que el nivel de educación científica y técnica que ha recibido es:');
            
            $table->integer('defina_ciencia_tecnologia_espacial')->comment('Pregunta #4. ¿Qué es para usted la ciencia y la tecnología espacial?. Seleccione una respuesta.');
            
            $table->integer('cual_considera_objetivo_ciencia_espacial')->comment('Pregunta #5. ¿Cuál considera usted es el principal objetivo de la ciencia espacial?');
            
            $table->integer('desarrollo_ciencia_tecno_espacial_servicio_de')->comment('Pregunta #7. En su opinión, considera usted que el desarrollo de la ciencia y la tecnología espacial deben estar al servicio de:');
            
            $table->integer('considera_ven_investiga_espacio')->comment('Pregunta #8. ¿Usted considera que en la República Bolivariana de Venezuela se hace investigación en ciencia y tecnología espacial?');
            
            $table->integer('estudio_espacial_contribuye_desarrollo_productivo')->comment('Pregunta #9. ¿Considera usted que en nuestro país el estudio y la investigación en ciencia espacial, puede contribuir al desarrollo de los sectores productivos y económicos de Venezuela?');
            
            $table->integer('conoce_abae')->comment('Pregunta #10. ¿Sabe usted si en nuestro país existe un organismo encargado de la gestión y la formulación de políticas públicas respecto al uso del espacio exterior?');
            
            $table->string('cual')->comment('Relacionado con la pregunta #10');
            
            $table->integer('satisfecho_informacion_espacial_trasmite_medios')->comment('Pregunta #13. ¿Usted está satisfecho con la información en ciencia y tecnología espacial que se transmite por los diversos medios nacionales?');
            
            $table->integer('util_sociedad_ven_informada_tema_espacial')->comment('Pregunta #14. ¿Le parece útil que la sociedad venezolana esté más informada sobre el tema espacial?');
            
            $table->integer('informado_sobre_satelites_venezolanos')->comment('Pregunta #16. Diga si usted está: Muy informado, Algo informado, Nada informado, sobre lo satélites venezolanos en órbita.');
            
            $table->integer('sabia_tenemos_dos_satelistes_observ_remota')->comment('Pregunta #17. ¿Sabía usted que nuestro país tiene en órbita dos satélites de observación remota?');
            
            $table->integer('considera_satelite_simon_bolivar_efecto_positivo')->comment('Pregunta #18. ¿Usted considera que el satélite Simón Bolívar generó efectos positivos o negativos al país?');
            
            $table->integer('considera_pertinente_gobierno_promueva_investigacion_espacial')->comment('Pregunta #19. ¿Usted considera pertinente que el Gobierno Nacional promueva la investigación y desarrollo en el tema espacial?');

            $table->integer('cree_gobierno_financia_actividades_espaciales')->comment('Pregunta #20. ¿Cree usted que el Gobierno apoya al financiamiento de las actividades científicas y tecnológicas en el área espacial?');

            $table->integer('si_existiera_mas_inversion_espacial_habria_avance')->comment('Pregunta #21. Si existiera más inversión pública en el tema espacial ¿Cree usted que se fortalecería el avance en ciencia y tecnología espacial?');

            $table->integer('considera_pertinente_regular_actividades_espaciales')->comment('Pregunta #22. ¿Considera usted pertinente que en nuestro país se regulen las actividades espaciales?');

            $table->integer('estaria_acuerdo_creacion_fondo_financiar_actividades_espaciales')->comment('Pregunta #23. En su opinión ¿La creación de un fondo para la recaudación de aportes para financiar proyectos en el área espacial, impulsaría el desarrollo de la ciencia y la tecnología espacial?');

            $table->integer('considera_pertinente_elaborar_plan_tema_espacial')->comment('Pregunta #24. Así como existe un Plan de la Patria donde se establece la visión a largo plazo del país ¿Usted considera pertinente que se elabore un plan nacional en materia espacial?');

            $table->text('comentarios_sugerencias_encuesta')->comment('Pregunta #25. Comentarios o sugerencias para mejorar el instrumento de consulta');

            $table->integer('id_encuestado');
            $table->integer('id_control_encuesta');
            
            $table->timestamps();
        });
        DB:select("ALTER TABLE encuesta_principals COMMENT = 'Encuesta principal'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta_principals');
    }
}
