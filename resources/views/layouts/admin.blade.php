<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    <li @if(Request::segment(2) == 'user') class="active" @endif>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                            <i class="glyphicon glyphicon-list"></i> Usuários <i class="caret pull-right" style="margin-top: 10px"></i>
                        </a>
                        <ul id="demo" @if(Request::segment(2) != 'user') class="collapse" @endif>
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
