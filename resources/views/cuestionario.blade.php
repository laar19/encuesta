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
        <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">
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
            <form id="register_form" method="post" action="{{ route('preguntas.store') }}">

                {!! csrf_field() !!}
                
                <fieldset>
                    <h2>Datos del Encuestado</h2>
                    
                    <hr>
                    <div class="row">
                          <div class="col-md-2">
                              <label>Cédula: </label>
                              <p>{{ $datas['saime']['cedula'] }}</p>
                              <input type="hidden" name="cedula" value="{{ $datas['saime']['cedula'] }}">
                        </div>
                          <div class="col-md-3">
                              <label>Nombres: </label>
                              <p>{{ $datas['saime']['primer_nombre'] }} {{ $datas['saime']['segundo_nombre'] }}</p>
                              <input type="hidden" name="primer_nombre" value="{{ $datas['saime']['primer_nombre'] }}">
                              <input type="hidden" name="segundo_nombre" value="{{ $datas['saime']['segundo_nombre'] }}">
                          </div>
                          <div class="col-md-3">
                              <label>Apellidos: </label>
                              <p>{{ $datas['saime']['primer_apellido'] }} {{ $datas['saime']['segundo_apellido'] }}</p>
                              <input type="hidden" name="primer_apellido" value="{{ $datas['saime']['primer_apellido'] }}">
                              <input type="hidden" name="segundo_apellido" value="{{ $datas['saime']['segundo_apellido'] }}">
                        </div>
                        <div class="col-md-2">
                              <label>Edad: </label>
                              <?php $age = (int)date("Y") - (int)date('Y', strtotime($datas['saime']['fecha_nacimiento'])); ?>
                              <p>{{ $age }}</p>
                              <input type="hidden" name="fecha_nacimiento" value="{{ $datas['saime']['fecha_nacimiento'] }}">

                              <?php
                                    $rango_edad = 0;
                                    if($age <= 18) {
                                        $rango_edad = 1;
                                    }
                                    else if($age > 18 && $age <= 30) {
                                        $rango_edad = 2;
                                    }
                                    else if($age > 30 && $age <= 50) {
                                        $rango_edad = 3;
                                    }
                                    else if($age > 50) {
                                        $rango_edad = 4;
                                    }
                              ?>
                              <input type="hidden" name="rango_edad" value="{{ $rango_edad }}">
                        </div>
                        <div class="col-md-2">
                              <label>Género: </label>
                              <p>{{ $datas['saime']['genero'] }}</p>
                            <input type="hidden" name="genero" value="{{ $datas['saime']['genero'] }}">
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row">
                          <div class="col-md-6">
                              <label>Nivel de instrucción</label>
                              <select class="form-control" id="" name="nivel_instruccion">

                                @foreach($datas['nivel_instruccion'] as $i)
                                    <option value="{{ $i->numero_opcion }}">{{ $i->opcion }}</option>
                                @endforeach
                                
                              </select>
                        </div>
                          <div class="col-md-6">
                              <label>Región</label>
                              <select class="form-control" id="" name="region">

                                @foreach($datas['region'] as $i)
                                    <option value="{{ $i->numero_opcion }}">{{ $i->opcion }}</option>
                                @endforeach
                                
                              </select>
                          </div>
                    </div>
                    <hr>
                    <input type="button" class="next-form btn btn-info" value="Siguiente" />
                </fieldset> 
                <fieldset>
                    <h2>
                        <!--
                        1.- De las siguientes actividades cuáles considera usted son Muy científicas, Nada científicas y Poco científicas
                        -->
                        1.-
                        @foreach($datas['pregunta1'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>

                    <hr>
                    <div class="row text-center">
                        <div class="col-md-3"><p id="titulo">Actividad</p></div>
                        @foreach($datas['otras_opciones1'] as $i)
                            <div class="col-md-3"><p id="titulo">{{ $i->opcion }}</p></div>
                        @endforeach
                    </div>
                    <hr>
                    <?php $row = 0; ?>
                    @foreach($datas['opciones1'] as $i)
                        <?php $row++; ?>
                        <div class="row text-center">
                            <div class="col-md-3 text-left">{{ $i->opcion }}</div>
                            @foreach($datas['otras_opciones1'] as $j)
                                <div class="col-md-3"><input type="radio" id="{{ $row.$id_pregunta }}" name="{{ $row.$id_pregunta }}" value="{{ $j->numero_opcion }}"></div>
                            @endforeach
                        </div>
                    @endforeach
                    
                    <hr>
                    
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>

                <fieldset>
                    <h2>
                        <!--
                        2.- Según su opinión, usted considera que el nivel de educación científica y técnica que ha recibido es:
                        -->
                        2.-
                        @foreach($datas['pregunta2'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones2'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        3.- ¿Qué competencias o habilidades le gustaría que el sistema educativo desarrolle en los jóvenes? (Seleccione máximo dos)
                        -->
                        3.-
                        @foreach($datas['pregunta3'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>
                    <hr>

                    <?php $row = 0; ?>
                    @foreach($datas['opciones3'] as $i)
                        <?php $row++; ?>
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $row.$id_pregunta }}" value="{{ $i->numero_opcion }}" class="" /></div>
                            <div class="col-md-11">
                                <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        4.- ¿Qué es para usted la ciencia y la tecnología espacial?. Seleccione una respuesta
                        -->
                        4.-
                        @foreach($datas['pregunta4'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>
                    
                    @foreach($datas['opciones4'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        5.- ¿Cuál considera usted es el principal objetivo de la ciencia espacial?
                        -->
                        5.-
                        @foreach($datas['pregunta5'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>
                    
                    @foreach($datas['opciones5'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        6.- Considera usted que el conocimiento científico y tecnológico en el tema espacial es útil para:
                        -->
                        6.-
                        @foreach($datas['pregunta6'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>
                    <hr>

                    <?php $row = 0; ?>
                    @foreach($datas['opciones6'] as $i)
                        <?php $row++; ?>
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $row.$id_pregunta }}" value="{{ $i->numero_opcion }}" class="" /></div>
                            <div class="col-md-11">
                                <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        7.- En su opinión, considera usted que el desarrollo de la ciencia y la tecnología espacial deben estar al servicio de:
                        -->
                        7.-
                        @foreach($datas['pregunta7'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones7'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        8.- ¿Usted considera que en la República Bolivariana de Venezuela se hace investigación en ciencia y tecnología espacial?
                        -->
                        8.-
                        @foreach($datas['pregunta8'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones8'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        9.- ¿Considera usted que en nuestro país el estudio y la investigación en ciencia espacial, puede contribuir al desarrollo de los sectores productivos y económicos de Venezuela?
                        -->
                        9.-
                        @foreach($datas['pregunta9'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones9'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        10.- ¿Sabe usted si en nuestro país existe un organismo encargado de la gestión y la formulación de políticas públicas respecto al uso del espacio exterior?
                        -->
                        10.-
                        @foreach($datas['pregunta10'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones10'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <br>
                    <div class="row text-left">
                        <input type="" name="pregunta10-1" id="" class="form-control" placeholder="Indique el organismo">
                    </div>
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        11.- Señale para cada uno de los siguientes organismos, si usted conoce, Mucho, Algo, Poco, o No conoce:
                        -->
                        11.-
                        @foreach($datas['pregunta11'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-3"><p id="titulo">Organismo</p></div>
                        @foreach($datas['otras_opciones11'] as $i)
                            <div class="col-md-3"><p id="titulo">{{ $i->opcion }}</p></div>
                        @endforeach
                    </div>
                    <hr>
                    <?php $row = 0; ?>
                    @foreach($datas['opciones11'] as $i)
                        <?php $row++; ?>
                        <div class="row text-center">
                            <div class="col-md-3 text-left">{{ $i->opcion }}</div>
                            @foreach($datas['otras_opciones11'] as $j)
                                <div class="col-md-3"><input type="radio" id="{{ $row.$id_pregunta }}" name="{{ $row.$id_pregunta }}" value="{{ $j->numero_opcion }}"></div>
                            @endforeach
                        </div>
                    @endforeach
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        12.- ¿A qué atribuye usted que en nuestro país no exista mayor avance en el tema espacial?
                        -->
                        12.-
                        @foreach($datas['pregunta12'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>
                    <hr>
                    
                    <?php $row = 0; ?>
                    @foreach($datas['opciones12'] as $i)
                        <?php $row++; ?>
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $row.$id_pregunta }}" value="{{ $i->numero_opcion }}" class="" /></div>
                            <div class="col-md-11">
                                <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        13.- ¿Usted está satisfecho con la información en ciencia y tecnología espacial que se transmite por los diversos medios nacionales?
                        -->
                        13.-
                        @foreach($datas['pregunta13'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>
                    
                    @foreach($datas['opciones13'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        14.- ¿Le parece útil que la sociedad venezolana esté más informada sobre el tema espacial?
                        -->
                        14.-
                        @foreach($datas['pregunta14'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones14'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        15.- ¿En qué aspectos de la ciencia espacial usted se interesaría?
                        -->
                        15.-
                         @foreach($datas['pregunta15'] as $i)
                            {{ $i->pregunta }}
                            {{ $id_pregunta = $i->id }}
                        @endforeach
                    </h2>
                    <hr>
                    
                    <?php $row = 0; ?>
                    @foreach($datas['opciones15'] as $i)
                        <?php $row++; ?>
                        <div class="row text-left">
                            <div class="col-md-1"><input type="checkbox" name="{{ $row.$id_pregunta }}" value="{{ $i->numero_opcion }}" class="" /></div>
                            <div class="col-md-11">
                                <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        16.- Diga si usted está: Muy informado, Algo informado, Nada informado, sobre lo satélites venezolanos en órbita:
                        -->
                        16.-
                        @foreach($datas['pregunta16'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones16'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                     
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        17.- ¿Sabía usted que nuestro país tiene en órbita dos satélites de observación remota?
                        -->
                        17.-
                        @foreach($datas['pregunta17'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                    <hr>

                    @foreach($datas['opciones17'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        18.- ¿Usted considera que el satélite Simón Bolívar generó efectos positivos o negativos al país?
                        -->
                        18.-
                        @foreach($datas['pregunta18'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones18'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        19.- ¿Usted considera pertinente que el Gobierno Nacional promueva la investigación y desarrollo en el tema espacial?
                        -->
                        19.-
                        @foreach($datas['pregunta19'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones19'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        20.- ¿Cree usted que el Gobierno apoya al financiamiento de las actividades científicas y tecnológicas en el área espacial?
                        -->
                        20.-
                        @foreach($datas['pregunta20'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones20'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        21.- Si existiera más inversión pública en el tema espacial ¿Cree usted que se fortalecería el avance en ciencia y tecnología espacial?
                        -->
                        21.-
                        @foreach($datas['pregunta21'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones21'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        22.- ¿Considera usted pertinente que en nuestro país se regulen las actividades espaciales?
                        -->
                        22.-
                        @foreach($datas['pregunta22'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones22'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        23.- En su opinión ¿La creación de un fondo para la recaudación de aportes para financiar proyectos en el área espacial, impulsaría el desarrollo de la ciencia y la tecnología espacial?
                        -->
                        23.-
                        @foreach($datas['pregunta23'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones23'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}"" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        24.- Así como existe un Plan de la Patria donde se establece la visión a largo plazo del país ¿Usted considera pertinente que se elabore un plan nacional en materia espacial?
                        -->
                        24.-
                        @foreach($datas['pregunta24'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>

                    @foreach($datas['opciones24'] as $i)
                        <div class="row text-left">
                            <div class="col-md-1">
                                <input type="radio" id="{{ $i->id }}" name="{{ $i->id_preguntas }}" value="{{ $i->numero_opcion }}">
                            </div>
                            <div class="col-md-11">
                                <label for="{{ $i->id }}">{{ $i->opcion }}</label>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr>
                    <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>
                        <!--
                        25.- Comentarios o sugerencias para mejorar el instrumento de consulta
                        -->
                        25.-
                        @foreach($datas['pregunta25'] as $i)
                            {{ $i->pregunta }}
                        @endforeach
                    </h2>
                     <hr>
                    <div class="row">
                          <div class="col-md-12">
                              <textarea name="pregunta25" id="" class="form-control" style="width:100%; height: 100px;"></textarea>
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
