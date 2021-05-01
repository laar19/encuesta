<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <br>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <span class="menu-title">Inicio</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('open') }}">
                <span class="menu-title">Aperturar encuesta</span>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('search_stats') }}">
                <span class="menu-title">Estadísticas</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Usuarios</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.create') }}">Crear</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Editar</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
