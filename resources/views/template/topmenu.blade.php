<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{ asset('/assets/layout/images/logo.png') }}" alt="logo">
        </a>

        <a class="navbar-brand brand-logo-mini" href="#">
            <img src="{{ asset('/assets/layout/images/logo-mini.png') }}" alt="logo">
        </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch">

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>

            <!--li class="nav-item nav-profile dropdown" -->
            <li class="nav-item nav-profile">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
