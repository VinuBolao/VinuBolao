@component('layouts.app')
    @slot('title') Home @endslot

    <div class="col-sm-12 box">
        @if (Auth::user()->master)
            <div class="row">
                <div class="col-sm-3">
                    <a href="{{ route('bolao.create') }}" class="btn btn-primary btn-block" role="button">
                        <i class="glyphicon glyphicon-plus"></i> Novo
                    </a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Lista</h2>
                <p>Veja a lista de bolões que você participa!</p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-football-player-setting-ball"></i>
            </div>
        </div>
    </div>

        @if(count($boloes) > 0)
            @foreach($boloes as $bolao)
                <div class="col-sm-12 box">
                    <div class="row">
                        <div class="col-sm-3" style="margin-bottom: 15px">
                            <a href="{{ route('participante.index') }}" class="btn btn-primary btn-block" title="Participantes">
                                <i class="glyphicon glyphicon-user"></i> Participantes
                            </a>
                        </div>

                        <div class="col-sm-3" style="margin-bottom: 15px">
                            <a href="{{ route('bolao.edit', $bolao->id) }}" class="btn btn-primary btn-block">
                                <i class="glyphicon glyphicon-pencil"></i> Editar
                            </a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2" class="title-show"><strong>{{ $bolao->nome }}</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Nome</th>
                            <td>{{ $bolao->nome }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Administrador</th>
                            <td>{{ $bolao->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Campeonato</th>
                            <td>{{ $bolao->campeonato->nome }} - {{ $bolao->campeonato->temporada }} - Série {{ $bolao->campeonato->serie }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Data Inicial</th>
                            <td>{{ $bolao->inicio }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Descrição</th>
                            <td>{{ $bolao->descricao }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        @else
            <div class="col-sm-12 box">
                <div class="alert alert-danger">
                    <p class="text-center">Não existe dados para listar!</p>
                </div>
            </div>
        @endif
@endcomponent
