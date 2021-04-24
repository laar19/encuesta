<nav class="navbar" style="background-color: #085896;">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('admin') }}">
            <img src="{{ asset('/assets/layout/images/logo.png') }}" alt="logo">
        </a>
    </div>

    <form class="form-inline">
        <span class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: white;">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a>
            </div>
        </span>
    </form>
</nav>
