<nav class="navbar" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('front::home') }}">
                <img src="{{ asset('img/logo.png') }}">
            </a>

            <a role="button" class="navbar-burger" id="burger-navbar" data-target="navbar" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navbar">
            <div class="navbar-start">
                <div class="navbar-item navbar-search">
                    {{ html()->form('GET', route('front::search'))->open() }}
                    <div class="control has-icons-left">
                        {{ html()->text('q', request()->query('q'))->class('input')->placeholder('¿Qué estás buscando?')->required() }}
                        <span class="icon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
            <div class="navbar-end">
                <a href="{{ route('front::stories.index') }}" class="navbar-item">
                    <span class="badge">New</span>
                    Historias
                </a>
                <div class="navbar-item navbar-item--separator">
                </div>
                @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <div class="navbar-item item-user">
                        <img class="avatar" src="{{ $loggedInUser->avatar_url }}">
                    </div>
                    <div class="navbar-dropdown is-boxed is-right">
                        @if($loggedInUser->isAn('admin'))
                        <a class="navbar-item" href="{{ route('radar::home') }}">
                            <span class="icon">
                                <i class="fas fa-cogs"></i>
                            </span>
                            <span>ACP Radar</span>
                        </a>
                        <hr class="navbar-divider">
                        @endif
                        {{ html()->a($loggedInUser->url, 'Mi perfil')->class('navbar-item') }}
                        {{ html()->a(route('front::profile.settings.show'), 'Configuración')->class('navbar-item') }}
                        <hr class="navbar-divider">
                        {{ html()->a(route('logout'), 'Cerrar sesión')->class('navbar-item') }}
                    </div>
                </div>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="navbar-item">Iniciar sesión</a>
                <div class="navbar-item">
                    <a href="{{ route('register') }}" class="btn-register">Crear cuenta</a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
