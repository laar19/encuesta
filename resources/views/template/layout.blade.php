<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Panel de control</title>
        
        <link href="{{ asset('/assets/layout/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/layout/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container-scroller">

            @yield('topmenu')

            <div class="container-fluid page-body-wrapper">

                @yield('sidebar')

                <div class="main-panel">

                    @yield('content')

                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>

                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
   </body>
</html>
