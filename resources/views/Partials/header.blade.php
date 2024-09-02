<nav id="head" class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
    <a class="navbar-brand" href="/dashboard">
        <img class="logo inline align-top" src="{{ asset('/img/logo_img_corte.jpg') }}" alt="Logotipo">
    </a>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle header_font" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                        <img class="header_icon_user inline" src="{{ asset('/img/do-utilizador.png') }}">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/perfil">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>