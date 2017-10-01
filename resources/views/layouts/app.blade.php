<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#000000">
    <meta name="apple-mobile-web-app-title" content="VinuBolao">
    <meta name="application-name" content="VinuBolao">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VinuBolão | {{ $title or 'Título' }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-106977927-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body class="bolao">
    <div id="app">
        @if (Auth::check())
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand"  href="{{ route('bolao.index') }}">
                        <i class="flaticon-ball-5"></i> VinuBolão
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li @if(Request::segment(1) == 'bolao') class="active" @endif>
                            <a href="{{ route('bolao.index') }}">Home</a>
                        </li>
                        <li @if(Request::segment(1) == 'classificacao') class="active" @endif>
                            <a href="{{ route('classificacao') }}">Classificação</a>
                        </li>
                        <li @if(Request::segment(1) == 'jogo') class="active" @endif>
                            <a href="{{ route('jogo.index') }}">Jogos</a>
                        </li>
                        <li @if(Request::segment(1) == 'palpite') class="active" @endif>
                            <a href="{{ route('palpite.index') }}">Palpites</a>
                        </li>
                        <li @if(Request::segment(1) == 'regulamento') class="active" @endif>
                            <a href="{{ route('regulamento') }}">Regulamento</a>
                        </li>
                        @if (Auth::user()->master)
                        <li>
                            <a href="{{ route('admin.user.index') }}">Dashboard</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <div class="container">
            <div class="row">
                {{ $slot }}
            </div>
        </div>

        @if (Auth::check())
        <div class="footer">
            <footer class="text-center">
                <span>VinuBolão &copy; 2017 - Criado por <a href="https://www.linkedin.com/in/gustavosantoslima" target="_blank">Gustavo Santos</a></span>
            </footer>
        </div>
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
