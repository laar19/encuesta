<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Panel de control</title>

  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">


  <!-- Common -->  
  <link href="{{ asset('/assets/admin/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/menubar/sidebar.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/helper.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/admin/css/style.css') }}" rel="stylesheet">

  <script src="{{ asset('/assets/js/main.js') }}"></script>
  <script src="{{ asset('/assets/chartjs/dist/Chart.js') }}"></script>
  <script src="{{ asset('/assets/js/stats/functions.js') }}"></script>
</head>

<body>

  <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
      <div class="nano-content">
        <div class="logo">
          <a href="index.html">
            <!-- <img src="assets/images/logo.png" alt="" /> -->
            <span>Panel de control</span>
          </a>
        </div>
        <ul>
          <li class="label">Main</li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-home"></i> Dashboard
              <span class="badge badge-primary">2</span>
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="index.html">Dashboard 1</a>
              </li>
              <li>
                <a href="index1.html">Dashboard 2</a>
              </li>



            </ul>
          </li>

          <li class="label">Apps</li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-bar-chart-alt"></i> Charts
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="chart-flot.html">Flot</a>
              </li>
              <li>
                <a href="chart-morris.html">Morris</a>
              </li>
              <li>
                <a href="chartjs.html">Chartjs</a>
              </li>
              <li>
                <a href="chartist.html">Chartist</a>
              </li>
              <li>
                <a href="chart-peity.html">Peity</a>
              </li>
              <li>
                <a href="chart-sparkline.html">Sparkle</a>
              </li>
              <li>
                <a href="chart-knob.html">Knob</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="app-event-calender.html">
              <i class="ti-calendar"></i> Calender </a>
          </li>
          <li>
            <a href="app-email.html">
              <i class="ti-email"></i> Email</a>
          </li>
          <li>
            <a href="app-profile.html">
              <i class="ti-user"></i> Profile</a>
          </li>
          <li>
            <a href="app-widget-card.html">
              <i class="ti-layout-grid2-alt"></i> Widget</a>
          </li>
          <li class="label">Features</li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-layout"></i> UI Elements
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="ui-typography.html">Typography</a>
              </li>
              <li>
                <a href="ui-alerts.html">Alerts</a>
              </li>

              <li>
                <a href="ui-button.html">Button</a>
              </li>
              <li>
                <a href="ui-dropdown.html">Dropdown</a>
              </li>

              <li>
                <a href="ui-list-group.html">List Group</a>
              </li>

              <li>
                <a href="ui-progressbar.html">Progressbar</a>
              </li>
              <li>
                <a href="ui-tab.html">Tab</a>
              </li>

            </ul>
          </li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-panel"></i> Components
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="uc-calendar.html">Calendar</a>
              </li>
              <li>
                <a href="uc-carousel.html">Carousel</a>
              </li>
              <li>
                <a href="uc-weather.html">Weather</a>
              </li>
              <li>
                <a href="uc-datamap.html">Datamap</a>
              </li>
              <li>
                <a href="uc-todo-list.html">To do</a>
              </li>
              <li>
                <a href="uc-scrollable.html">Scrollable</a>
              </li>
              <li>
                <a href="uc-sweetalert.html">Sweet Alert</a>
              </li>
              <li>
                <a href="uc-toastr.html">Toastr</a>
              </li>
              <li>
                <a href="uc-range-slider-basic.html">Basic Range Slider</a>
              </li>
              <li>
                <a href="uc-range-slider-advance.html">Advance Range Slider</a>
              </li>
              <li>
                <a href="uc-nestable.html">Nestable</a>
              </li>

              <li>
                <a href="uc-rating-bar-rating.html">Bar Rating</a>
              </li>
              <li>
                <a href="uc-rating-jRate.html">jRate</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-layout-grid4-alt"></i> Table
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="table-basic.html">Basic</a>
              </li>

              <li>
                <a href="table-export.html">Datatable Export</a>
              </li>
              <li>
                <a href="table-row-select.html">Datatable Row Select</a>
              </li>
              <li>
                <a href="table-jsgrid.html">Editable </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-heart"></i> Icons
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="font-themify.html">Themify</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-map"></i> Maps
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="gmaps.html">Basic</a>
              </li>
              <li>
                <a href="vector-map.html">Vector Map</a>
              </li>
            </ul>
          </li>
          <li class="label">Form</li>
          <li>
            <a href="form-basic.html">
              <i class="ti-view-list-alt"></i> Basic Form </a>
          </li>
          <li class="label">Extra</li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-files"></i> Invoice
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="invoice.html">Basic</a>
              </li>
              <li>
                <a href="invoice-editable.html">Editable</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="sidebar-sub-toggle">
              <i class="ti-target"></i> Pages
              <span class="sidebar-collapse-icon ti-angle-down"></span>
            </a>
            <ul>
              <li>
                <a href="page-login.html">Login</a>
              </li>
              <li>
                <a href="page-register.html">Register</a>
              </li>
              <li>
                <a href="page-reset-password.html">Forgot password</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="../documentation/index.html">
              <i class="ti-file"></i> Documentation</a>
          </li>
          <li>
            <a>
              <i class="ti-close"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /# sidebar -->


  <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="float-left">
            <div class="hamburger sidebar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div>
          <div class="float-right">
            <div class="dropdown dib">
              <div class="header-icon" data-toggle="dropdown">
                <span class="user-avatar">John
                  <i class="ti-angle-down f-s-10"></i>
                </span>
                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                  <div class="dropdown-content-heading">
                    <span class="text-left">Upgrade Now</span>
                    <p class="trial-day">30 Days Trail</p>
                  </div>
                  <div class="dropdown-content-body">
                    <ul>
                      <li>
                        <a href="#">
                          <i class="ti-user"></i>
                          <span>Profile</span>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="ti-email"></i>
                          <span>Inbox</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="ti-settings"></i>
                          <span>Setting</span>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="ti-lock"></i>
                          <span>Lock Screen</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="ti-power-off"></i>
                          <span>Logout</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1><p>Hello, wellcome here</p>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">App-Widget-Card</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <div id="main-content">







            

            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                            if(count($data) > 0) {
                                print_r('Existe una encuesta abierta');
                                echo '<br>';
                                print_r('Fecha de apertura: ' . $data[0]->fecha_apertura);
                                echo '<br>';
                                print_r('Fecha de cierre: ' . $data[0]->fecha_apertura);
                                ?>
                                <form id="" method="post" action="{{ route('close_quest') }}">
                                    {!! csrf_field() !!}
                                    <input type="submit" name="submit" class="submit btn btn-outline-danger" value="Cerrar encuesta" />
                                </form>
                                <?php
                            }
                            else {
                                ?>
                                <form id="" method="post" action="{{ route('store_quest') }}">

                                    {!! csrf_field() !!}
                                    
                                    <label for="fecha_apertura">Fecha de apertura</label>
                                    <input type="date" name="fecha_apertura">
                                    
                                    <br>
                                    
                                    <label for="fecha_cierre">Fecha de cierre</label>        
                                    <input type="date" name="fecha_cierre">
                                    
                                    <br>
                                    
                                    <input type="submit" name="submit" class="submit btn btn-success" value="Aperturar encuesta" />
                                </form>
                                <?php
                            }
                        ?>
                    </div>
                </div>                
                <div class="row">
                    <div class="col">
                        
                        <!-- ### Número de encuestados ###  -->
            
                        <div class="card">
                            <?php $estadisticas = stats(); ?>

                            <?php
                                $id                                 = 'numero_encuestados';
                                $numero_encuestados                 = $estadisticas['numero_encuestados'];
                                $numero_encuestados_masculinos      = $estadisticas['numero_encuestados_masculinos'];
                                $numero_encuestados_femeninos       = $estadisticas['numero_encuestados_femeninos'];
                                $porcentaje_encuestados_masculinos  = $estadisticas['porcentaje_encuestados_masculinos'];
                                $porcentaje_encuestados_femeninos   = $estadisticas['porcentaje_encuestados_femeninos'];
                            ?>
                            
                            <script>
                                var numero_encuestados_masculinos = <?php echo json_encode($numero_encuestados_masculinos); ?>;
                                var numero_encuestados_femeninos  = <?php echo json_encode($numero_encuestados_femeninos); ?>;
                                
                                var porcentaje_encuestados_masculinos = <?php echo json_encode($porcentaje_encuestados_masculinos); ?>;
                                var porcentaje_encuestados_femeninos  = <?php echo json_encode($porcentaje_encuestados_femeninos); ?>;

                                var labels = [
                                    'Masculinos ' + numero_encuestados_masculinos,
                                    'Femeninos ' + numero_encuestados_femeninos
                                ]

                                var data = [porcentaje_encuestados_masculinos, porcentaje_encuestados_femeninos];

                                var colors               = fill_background_hover_color(data.length);
                                var backgroundColor      = colors[0];
                                var hoverBackgroundColor = colors[1];

                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        data: data,
                                        backgroundColor: backgroundColor,
                                        hoverBackgroundColor: hoverBackgroundColor
                                    }]
                                };

                                var options = {
                                    title: {
                                        display: true,
                                        text: 'Encuestados: ' + <?php echo json_encode($numero_encuestados); ?>
                                    }
                                };
                            </script>
                          
                            <canvas id="<?php echo $id ?>"></canvas>

                            <script>
                                var type = "doughnut";
                                var id   = document.getElementById('<?php echo $id; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                    
                    <div class="col">

                        <!-- ### % De distribucón por rango de edades ###  -->
                        
                        <div class="card">
                            <?php
                                $id       = 'porcentaje_rango_edades';
                                $stats    = $estadisticas['porcentaje_rango_edades'];
                                $keys     = $stats->keys();
                                $values   = collect();

                                for($i=0; $i<=(count($keys)-1); $i++) {
                                    $values->push($stats->get($keys[$i]));
                                }
                            ?>
                            
                            <script>
                                var data   = <?php echo json_encode($values); ?>;
                                var labels = <?php echo json_encode($keys); ?>;

                                var colors               = fill_background_hover_color(data.length);
                                var backgroundColor      = colors[0];
                                var hoverBackgroundColor = colors[1];
                                
                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        label: "Porcentaje",
                                        fillColor: "#2E3436",
                                        data: data,
                                        backgroundColor: backgroundColor,
                                        hoverBackgroundColor: hoverBackgroundColor
                                    }]
                                };

                                var options = {
                                    title: {
                                        display: true,
                                        text: "Distribucón por rango de edades"
                                    }
                                };
                            </script>
                          
                            <canvas id="<?php echo $id ?>"></canvas>

                            <script>
                                var type = "horizontalBar";
                                var id   = document.getElementById('<?php echo $id; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                    
                    <div class="col">

                        <!-- ### % De distribucón por nivel de instrucción ###  -->
                        
                        <div class="card">
                            <?php
                                $id       = 'porcentaje_nivel_instruccion';
                                $stats    = $estadisticas['porcentaje_nivel_instruccion'];
                                $keys     = $stats->keys();
                                $values   = collect();

                                for($i=0; $i<=(count($keys)-1); $i++) {
                                    $values->push($stats->get($keys[$i]));
                                }
                            ?>
                            
                            <script>
                                var data   = <?php echo json_encode($values); ?>;
                                var labels = <?php echo json_encode($keys); ?>;

                                var colors               = fill_background_hover_color(data.length);
                                var backgroundColor      = colors[0];
                                var hoverBackgroundColor = colors[1];
                                
                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        label: "Porcentaje",
                                        fillColor: "#2E3436",
                                        data: data,
                                        backgroundColor: backgroundColor,
                                        hoverBackgroundColor: hoverBackgroundColor
                                    }]
                                };

                                var options = {
                                    title: {
                                        display: true,
                                        text: "Distribucón por nivel de instrucción"
                                    }
                                };
                            </script>
                          
                            <canvas id="<?php echo $id ?>"></canvas>

                            <script>
                                var type = "horizontalBar";
                                var id   = document.getElementById('<?php echo $id; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">

                        <!-- ### % De distribucón por región ###  -->
                        
                        <div class="card">
                            <?php
                                $id       = 'porcentaje_region';
                                $stats    = $estadisticas['porcentaje_region'];
                                $keys     = $stats->keys();
                                $values   = collect();

                                for($i=0; $i<=(count($keys)-1); $i++) {
                                    $values->push($stats->get($keys[$i]));
                                }
                            ?>
                            
                            <script>
                                var data   = <?php echo json_encode($values); ?>;
                                var labels = <?php echo json_encode($keys); ?>;

                                var colors               = fill_background_hover_color(data.length);
                                var backgroundColor      = colors[0];
                                var hoverBackgroundColor = colors[1];
                                
                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        label: "Porcentaje",
                                        fillColor: "#2E3436",
                                        data: data,
                                        backgroundColor: backgroundColor,
                                        hoverBackgroundColor: hoverBackgroundColor
                                    }]
                                };

                                var options = {
                                    title: {
                                        display: true,
                                        text: "Distribucón por región"
                                    }
                                };
                            </script>
                          
                            <canvas id="<?php echo $id ?>"></canvas>

                            <script>
                                var type = "horizontalBar";
                                var id   = document.getElementById('<?php echo $id; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                    <div class="col">                        
                        <div class="card">
                            <h2>AQUÍ PUEDE IR OTRA COSA</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h2> Distribución de respuestas por preguntas </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h5> Preguntas de selección simple </h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- ### % Distribución de respuestas por preguntas de selección simple ###  -->

                    <?php
                        $stats  = $estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_simple');
                        $keys   = $stats->keys();

                        $count = 0;
                        foreach($keys as $i) {
                            $count++;
                            $id = 'porcentaje_respuestas_seleccion_simple'.$count;
                            $aux = json_decode($stats->get($i));

                            $data     = collect();
                            $labels   = collect();
                            $pregunta = collect();
                                
                            foreach($aux as $j) {
                                $data->push($j->porcentaje);
                                $labels->push($j->opcion . ' ' . $j->total);
                                $pregunta->push($j->pregunta);
                            }
                            ?>

                            <div class="col-6">
                                <div class="card">
                                    <script>
                                        var data   = <?php echo json_encode($data); ?>;
                                        var labels = <?php echo json_encode($labels); ?>;                                        

                                        var colors               = fill_background_hover_color(data.length);
                                        var backgroundColor      = colors[0];
                                        var hoverBackgroundColor = colors[1];

                                        var data = {
                                            labels: labels,
                                            datasets: [{
                                                label: "Porcentaje",
                                                data: data,
                                                backgroundColor: backgroundColor,
                                                hoverBackgroundColor: hoverBackgroundColor
                                            }]
                                        };

                                        var options = {
                                            title: {
                                                display: true,
                                                text: '<?php echo $pregunta[0]; ?>'
                                            }
                                        };
                                    </script>
                                  
                                    <canvas id="<?php echo $id ?>"></canvas>

                                    <script>
                                        var type = "pie";
                                        var id   = document.getElementById('<?php echo $id; ?>');
                                        new_chart(id, type, data, options);
                                    </script>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h5> Preguntas de selección múltiple </h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- ### % Distribución de respuestas por preguntas de selección múltiple ###  -->

                    <?php
                        $stats  = $estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_multiple');
                        $keys   = $stats->keys();

                        $count = 0;
                        foreach($keys as $i) {
                            $count++;
                            $id = 'porcentaje_respuestas_seleccion_multiple'.$count;
                            $aux = json_decode($stats->get($i));

                            $data     = collect();
                            $labels   = collect();
                            $pregunta = collect();

                            foreach($aux as $j) {
                                $data->push($j->porcentaje);
                                $labels->push($j->opcion . ' ' . $j->total);
                                $pregunta->push($j->pregunta);
                            }
                            ?>
                            <div class="col">
                                <div class="card">
                                    <script>
                                        var data   = <?php echo json_encode($data); ?>;
                                        var labels = <?php echo json_encode($labels); ?>;                                        

                                        var colors               = fill_background_hover_color(data.length);
                                        var backgroundColor      = colors[0];
                                        var hoverBackgroundColor = colors[1];

                                        var data = {
                                            labels: labels,
                                            datasets: [{
                                                label: "Porcentaje",
                                                data: data,
                                                backgroundColor: backgroundColor,
                                                hoverBackgroundColor: hoverBackgroundColor
                                            }]
                                        };

                                        var options = {
                                            title: {
                                                display: true,
                                                text: '<?php echo $pregunta[0]; ?>'
                                            }
                                        };
                                    </script>
                                  
                                    <canvas id="<?php echo $id ?>"></canvas>

                                    <script>
                                        var type = "pie";
                                        var id   = document.getElementById('<?php echo $id; ?>');
                                        new_chart(id, type, data, options);
                                    </script>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h2> Distribución de respuestas por preguntas por género </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h5> Preguntas de selección simple </h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- ### % Distribución de respuestas por preguntas de selección simple ###  -->

                    <?php
                        $stats  = $estadisticas['porcentaje_respuestas_genero']->get('respuestas_seleccion_simple');
                        $keys   = $stats->keys();

                        //print_r($stats->get('pregunta2')->get('F')[0]['porcentaje']);
                        //print_r(json_decode($stats->get('pregunta2')->get('labels')));
                        //exit;

                        $count = 0;
                        foreach($keys as $i) {
                            $count++;
                            $id = 'porcentaje_respuestas_genero_seleccion_simple'.$count;

                            $male_data   = collect();
                            $female_data = collect();
                            $labels      = collect();
                            $pregunta    = $i;
                            
                            $aux   = $stats->get($i);
                            $keys2 = $aux->keys();

                            foreach($aux->get('labels') as $j){
                                $labels->push($j->opcion);
                            }

                            foreach($aux->get('M') as $j){
                                $male_data->push(json_decode($j)->porcentaje);
                            }

                            foreach($aux->get('F') as $j){
                                $male_data->push(json_decode($j)->porcentaje);
                            }
                            ?>

                            <div class="col">
                                <div class="card">
                                    <script>
                                        var male_data     = <?php echo json_encode($male_data); ?>;
                                        var female_data   = <?php echo json_encode($female_data); ?>;
                                        var labels        = <?php echo json_encode($labels); ?>;
                                        var pregunta      = <?php echo json_encode($pregunta); ?>;

                                        console.log('MALE DATA:');
                                        console.log(male_data);
                                        console.log('FEMALE DATA:');
                                        console.log(female_data);
                                        
                                        var colors               = fill_background_hover_color(data.length);
                                        var backgroundColor      = colors[0];
                                        var hoverBackgroundColor = colors[1];

                                        var data = {
                                            labels: labels,
                                            datasets: [
                                                {
                                                    label: "Masculinos",
                                                    data: male_data,
                                                    backgroundColor: "#3e95cd",
                                                },
                                                {
                                                    label: "Femeninos",
                                                    data: female_data,
                                                    backgroundColor: "#8e5ea2",
                                                }
                                            ]
                                        };

                                        var options = {
                                            title: {
                                                display: true,
                                                //text: '<?php echo $pregunta[0]; ?>'
                                                text: pregunta
                                            }
                                        };
                                    </script>
                                  
                                    <canvas id="<?php echo $id ?>"></canvas>

                                    <script>
                                        var type = "bar";
                                        var id   = document.getElementById('<?php echo $id; ?>');
                                        new_chart(id, type, data, options);
                                    </script>
                                </div>
                            </div>
                    <?php break;} ?>
                </div>
                <div class="row">
                    <div class="col">                        
                        <div class="card">
                            <h5> Preguntas de selección múltiple </h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- ### % Distribución de respuestas por preguntas de selección múltiple ###  -->

                    <?php
                        exit;
                        $stats  = $estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_multiple');
                        $keys   = $stats->keys();

                        $count = 0;
                        foreach($keys as $i) {
                            $count++;
                            $id = 'porcentaje_respuestas_genero_seleccion_multiple'.$count;
                            $aux = json_decode($stats->get($i));

                            $data     = collect();
                            $labels   = collect();
                            $pregunta = collect();

                            foreach($aux as $j) {
                                $data->push($j->porcentaje);
                                $labels->push($j->opcion . ' ' . $j->total);
                                $pregunta->push($j->pregunta);
                            }
                            ?>
                            <div class="col">
                                <div class="card">
                                    <script>
                                        var data   = <?php echo json_encode($data); ?>;
                                        var labels = <?php echo json_encode($labels); ?>;                                        

                                        var colors               = fill_background_hover_color(data.length);
                                        var backgroundColor      = colors[0];
                                        var hoverBackgroundColor = colors[1];

                                        var data = {
                                            labels: labels,
                                            datasets: [{
                                                label: "Porcentaje",
                                                data: data,
                                                backgroundColor: backgroundColor,
                                                hoverBackgroundColor: hoverBackgroundColor
                                            }]
                                        };

                                        var options = {
                                            title: {
                                                display: true,
                                                text: '<?php echo $pregunta[0]; ?>'
                                            }
                                        };
                                    </script>
                                  
                                    <canvas id="<?php echo $id ?>"></canvas>

                                    <script>
                                        var type = "pie";
                                        var id   = document.getElementById('<?php echo $id; ?>');
                                        new_chart(id, type, data, options);
                                    </script>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                








                
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2018 © Admin Board. -
                  <a href="#">example.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Common -->
    <script src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/jquery.nanoscroller.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/preloader/pace.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/assets/js/stats/main.js') }}"></script>
</body>

</html>
