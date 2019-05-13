@component('layouts.admin')
    @slot('pageTitle') Listando @endslot
    @slot('pageSub') Jogos @endslot

    <div class="row">
        <form action="{{ route('admin.jogo.index') }}" method="get">
            <div class="col-sm-3">
                <label for="infoRodada">Rodada:</label>
                <input id="infoRodada" name="rodada" value="{{ request('rodada') }}" type="number" class="form-control" placeholder="Digite a rodada...">
            </div>
            <div class="col-sm-4">
                <label for="infoCampeonato">Campeonato:</label>
                <select class="form-control" name="campeonatoId" id="infoCampeonato">
                    <option value="0">Selecione um campeonato...</option>
                    @foreach($campeonatos as $campeonato)
                        <option value="{{ $campeonato->id }}" {{ ($campeonato->id == request('campeonatoId')) ? 'selected' : '' }}>{{ $campeonato->nome_completo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-secondary btn-block btn-admin btn-admin-filter" title="Filtrar">
                    <i class="glyphicon glyphicon-search"></i> Filtrar
                </button>
            </div>
        </form>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.jogo.create') }}" class="btn btn-secondary btn-admin" title="Novo">
                <i class="glyphicon glyphicon-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(count($jogos) > 0)
                {{ $jogos->appends(request()->query())->links() }}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bolão</th>
                            <th>Campeonato</th>
                            <th>Rodada</th>
                            <th colspan="5">Jogo</th>
                            <th>Inicio</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jogos as $key => $jogo)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $jogo->bolao->nome }}</td>
                                <td>{{ $jogo->campeonato->nome }}</td>
                                <td>{{ $jogo->rodada }}ª</td>
                                <td>{{ $jogo->timecasa->nome }}</td>
                                <td>{{ $jogo->placar_casa }}</td>
                                <td>x</td>
                                <td>{{ $jogo->placar_fora }}</td>
                                <td>{{ $jogo->timefora->nome }}</td>
                                <td>{{ \Carbon\Carbon::parse($jogo->inicio)->format('H:i - d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.jogo.show', $jogo->id) }}" class="btn btn-secondary" title="Visualizar">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('admin.jogo.edit', $jogo->id) }}" class="btn btn-secondary" title="Editar">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $jogos->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
@endcomponent