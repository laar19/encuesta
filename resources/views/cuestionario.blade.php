<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ABAE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script-->
        
        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link href="{{ asset('/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}" rel="stylesheet">
        <!-- STYLE CSS -->
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">        
    </head>
    <body>
    <style type="text/css">
            #register_form fieldset:not(:first-of-type) {
                display: none;
            }

            #titulo{
                font-size: 18px;
                color: black;
                font-weight: bold;
            }
        </style>
        <div class="wrapper height: 1600px;">
            <span>Progreso de la encuesta</span>                    
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="alert alert-success hide"></div>
            <br>
            <form id="register_form" novalidate action="multi_form_action.php"  method="post">  
                <fieldset>
                    <h2>Datos del Encuestado</h2>
                    <hr>
                    <div class="row">
                          <div class="col-md-2">
                              <label>Cédula: </label>
                              <p>15201838</p>
                        </div>
                          <div class="col-md-3">
                              <label>Nombres: </label>
                              <p>Jesús Salvador</p>
                          </div>
                          <div class="col-md-3">
                              <label>Apellidos: </label>
                              <p>Cardiel Garcia</p>
                        </div>
                        <div class="col-md-2">
                              <label>Edad: </label>
                              <p>41 años</p>
                        </div>
                        <div class="col-md-2">
                              <label>Género: </label>
                              <p>Masculino</p>
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row">
                          <div class="col-md-6">
                              <label>Nivel de instrucción</label>
                              <select class="form-control" id="">

                                @foreach($datas['referencia_nivel_instruccion'] as $i)
                                    <option>{{ $i->descripcion }}</option>
                                @endforeach
                                
                              </select>
                        </div>
                          <div class="col-md-6">
                              <label>Región</label>
                              <select class="form-control" id="">

                                @foreach($datas['referencia_estados_de_venezuela'] as $i)
                                    <option>{{ $i->nombre_estado }}</option>
                                @endforeach
                                
                              </select>
                          </div>
                    </div>
                    <hr>
                    <input type="button" class="next-form btn btn-info" value="Siguiente" />
                </fieldset> 
                <fieldset>
                    <h2>
                        1.- De las siguientes actividades cuáles considera usted son Muy científicas, Nada científicas y Poco científicas
                    </h2>
                    <hr>
                    <div class="row text-center">
                          <div class="col-md-3"><p id="titulo">Actividad</p></div>
                          <div class="col-md-3"><p id="titulo">Muy científica</p></div>
                          <div class="col-md-3"><p id="titulo">Nada cietífica</p></div>
                          <div class="col-md-3"><p id="titulo">Poco científica</p></div>
                    </div>
                    <hr>

                    @foreach($datas['referencia_actividades_cientificas'] as $i)
                        <div class="row text-center">
                            <div class="col-md-3 text-left">{{ $i->descripcion }}</div>
                            <div class="col-md-3"><input type="checkbox" name="muy_cientifica" id="" class="" /></div>
                            <div class="col-md-3"><input type="checkbox" name="nada_cientifica" id="" class="" /></div>
                            <div class="col-md-3"><input type="checkbox" name="poco_cientifica" id="" class="" /></div>
                        </div>
                    @endforeach

                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>

                <fieldset>
                    <h2>
                        2.- Según su opinión, usted considera que el nivel de educación científica y técnica que ha recibido es:
                    </h2>
                    <hr>

                    @foreach($datas['referencia_nivel_educ_cientifica_tec_recibido'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        3.- ¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes? (Seleccione máximo dos)
                    </h2>
                    <hr>

                    @foreach($datas['referencia_comp_habi_sis_educ_jovenes'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        4.- ¿Qué es para usted la ciencia y la tecnología espacial?. Seleccione una respuesta
                    </h2>
                    <hr>

                    @foreach($datas['referencia_defina_ciencia_tecnologia_espacial'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        5.- ¿Cuál considera usted es el principal objetivo de la ciencia espacial?
                    </h2>
                    <hr>

                    @foreach($datas['referencia_cual_considera_objetivo_ciencia_espacial'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        6.- Considera usted que el conocimiento científico y tecnológico en el tema espacial es útil para:
                    </h2>
                    <hr>

                    @foreach($datas['referencia_conoci_cientifico_tecnologico_espacial_util'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        7.- En su opinión, considera usted que el desarrollo de la ciencia y la tecnología espacial deben estar al servicio de:
                    </h2>
                    <hr>

                    @foreach($datas['referencia_desarrollo_ciencia_tecno_espacial_servicio_de'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        8.- ¿Usted considera que en la República Bolivariana de Venezuela se hace investigación en ciencia y tecnología espacial?
                    </h2>
                    <hr>

                    @foreach($datas['referencia_considera_ven_investiga_espacio'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        9.- ¿Considera usted que en nuestro país el estudio y la investigación en ciencia espacial, puede contribuir al desarrollo de los sectores productivos y económicos de Venezuela?
                    </h2>
                    <hr>

                    @foreach($datas['referencia_estudio_espacial_contribuye_desarrollo_productivo'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        10.- ¿Sabe usted si en nuestro país existe un organismo encargado de la gestión y la formulación de políticas públicas respecto al uso del espacio exterior?
                    </h2>
                    <hr>

                    @foreach($datas['referencia_conoce_abae'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $i->id }}" id="" class="" /></div>
                            <div class="col-md-11">{{ $i->descripcion }}</div>
                        </div>
                    @endforeach
                    
                    <br>
                    <div class="row text-left">
                        <input type="" name="" id="" class="form-control" placeholder="Indique el organismo">
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        11.- Señale para cada uno de los siguientes organismos, si usted conoce, Mucho, Algo, Poco, o No conoce:
                    </h2>
                    <hr>
                    <div class="row text-center">
                          <div class="col-md-3"><p id="titulo">Organismo</p></div>
                          <div class="col-md-2"><p id="titulo">Mucho</p></div>
                          <div class="col-md-2"><p id="titulo">Algo</p></div>
                          <div class="col-md-2"><p id="titulo">Poco</p></div>
                          <div class="col-md-3"><p id="titulo">No conoce</p></div>
                    </div>
                    <hr>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">MPPCT</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">IVIC</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">ABAE</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">IDEA</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">CIDA</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">FII</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">CIAE</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">DIDA</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">CENDITEL</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">CENDIT</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">CNTQ</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <div class="row text-center">
                          <div class="col-md-3 text-left">INTEVEP</div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-2"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-3"><input type="checkbox" name="" id="" class="" /></div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        12.- ¿A qué atribuye usted que en nuestro país no exista mayor avance en el tema espacial?
                    </h2>
                    <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Poca inversión en el área</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Carencia de científicos e ingenieros en el área</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">La sociedad venezolana no está interesada en el tema espacial</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No se realiza investigación científica en el tema espacial</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No existe la infraestructura necesaria</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Las empresas privadas no apoyan la investigación en el área espacial</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">El bloqueo unilateral de los EE.UU</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">La crisis económica</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        13.- ¿Usted está satisfecho con la información en ciencia y tecnología espacial que se transmite por los diversos medios nacionales?
                    </h2>
                    <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        14.- ¿Le parece útil que la sociedad venezolana esté más informada sobre el tema espacial?
                    </h2>
                    <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        15.- ¿En qué aspectos de la ciencia espacial usted se interesaría?
                    </h2>
                    <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Astronomía</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Ingeniería aeroespacial</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Puesta en órbita de satélites</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Exploración espacial</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Vuelos espaciales tripulados y no tripulados</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Observación de la Tierra</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        16.- Diga si usted está: Muy informado, Algo informado, Nada informado, sobre lo satélites venezolanos en órbita:
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Informado</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Algo informado</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Nada Informado</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        17.- ¿Sabía usted que nuestro país tiene en órbita dos satélites de observación remota?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        18.- ¿Usted considera que el satélite Simón Bolívar generó efectos positivos o negativos al país?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Positivos</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Negativos</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Ninguna de las anteriores</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        19.- ¿Usted considera pertinente que el Gobierno Nacional promueva la investigación y desarrollo en el tema espacial?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        20.- ¿Cree usted que el Gobierno apoya al financiamiento de las actividades científicas y tecnológicas en el área espacial?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No sabe</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        21.- Si existiera más inversión pública en el tema espacial ¿Cree usted que se fortalecería el avance en ciencia y tecnología espacial?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        22.- ¿Considera usted pertinente que en nuestro país se regulen las actividades espaciales?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        23.- En su opinión ¿La creación de un fondo para la recaudación de aportes para financiar proyectos en el área espacial, impulsaría el desarrollo de la ciencia y la tecnología espacial?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        24.- Así como existe un Plan de la Patria donde se establece la visión a largo plazo del país ¿Usted considera pertinente que se elabore un plan nacional en materia espacial?
                    </h2>
                     <hr>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">Si</div>
                    </div>
                    <div class="row text-left">
                          <div class="col-md-1"><input type="checkbox" name="" id="" class="" /></div>
                          <div class="col-md-11">No</div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        25.- Comentarios o sugerencias para mejorar el instrumento de consulta
                    </h2>
                     <hr>
                    <div class="row">
                          <div class="col-md-12">
                              <textarea name="" id="" class="form-control" style="width:100%; height: 100px;"></textarea>
                          </div>
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="submit" name="submit" class="submit btn btn-success" value="Enviar" />
                </fieldset>
            </form>
        </div>
        <!-- jQuery -->
        <script src="{{ asset('/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery/jquery.steps.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery/form.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery/main.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

        <!-- Template created and distributed by Colorlib -->
    </body>
</html>
