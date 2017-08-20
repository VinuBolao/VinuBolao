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

    <title>VinuBolão | Admin</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="admin">
    <div id="app" class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('bolao.index') }}">
                    <i class="flaticon-ball-5"></i> VinuBolão
                </a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                    <li @if(Request::segment(2) == 'campeonato') class="active" @endif>
                        <a href="javascript:;" data-toggle="collapse" data-target="#campeonato">
                            <i class="glyphicon glyphicon-list"></i> Campeonatos <i class="caret pull-right" style="margin-top: 10px"></i>
                        </a>
                        <ul id="campeonato" @if(Request::segment(2) != 'campeonato') class="collapse" @endif>
                            <li @if(Request::url() == route('admin.campeonato.index')) class="active" @endif>
                                <a href="{{ route('admin.campeonato.index') }}">Listar</a>
                            </li>
                            <li @if(Request::url() == route('admin.campeonato.create')) class="active" @endif>
                                <a href="{{ route('admin.campeonato.create') }}">Novo</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Request::segment(2) == 'jogo') class="active" @endif>
                        <a href="javascript:;" data-toggle="collapse" data-target="#jogo">
                            <i class="glyphicon glyphicon-list"></i> Jogos <i class="caret pull-right" style="margin-top: 10px"></i>
                        </a>
                        <ul id="jogo" @if(Request::segment(2) != 'jogo') class="collapse" @endif>
                            <li @if(Request::url() == route('admin.jogo.index')) class="active" @endif>
                                <a href="{{ route('admin.jogo.index') }}">Listar</a>
                            </li>
                            <li @if(Request::url() == route('admin.jogo.create')) class="active" @endif>
                                <a href="{{ route('admin.jogo.create') }}">Novo</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Request::segment(2) == 'time') class="active" @endif>
                        <a href="javascript:;" data-toggle="collapse" data-target="#time">
                            <i class="glyphicon glyphicon-list"></i> Times <i class="caret pull-right" style="margin-top: 10px"></i>
                        </a>
                        <ul id="time" @if(Request::segment(2) != 'time') class="collapse" @endif>
                            <li @if(Request::url() == route('admin.time.index')) class="active" @endif>
                                <a href="{{ route('admin.time.index') }}">Listar</a>
                            </li>
                            <li @if(Request::url() == route('admin.time.create')) class="active" @endif>
                                <a href="{{ route('admin.time.create') }}">Novo</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Request::segment(2) == 'user') class="active" @endif>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user">
                            <i class="glyphicon glyphicon-list"></i> Usuários <i class="caret pull-right" style="margin-top: 10px"></i>
                        </a>
                        <ul id="user" @if(Request::segment(2) != 'user') class="collapse" @endif>
                            <li @if(Request::url() == route('admin.user.index')) class="active" @endif>
                                <a href="{{ route('admin.user.index') }}">Listar</a>
                            </li>
                            <li @if(Request::url() == route('admin.user.create')) class="active" @endif>
                                <a href="{{ route('admin.user.create') }}">Novo</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">
                            {{ $pageTitle or 'Title' }}
                            <small><i class="glyphicon glyphicon-menu-right"></i> {{ $pageSub or 'Subtitle' }}</small>
                        </h1>
                    </div>
                </div>

                {{ $slot or 'Hello Word!' }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
