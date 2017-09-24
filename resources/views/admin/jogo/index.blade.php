@component('layouts.admin')
    @slot('pageTitle') Listando @endslot
    @slot('pageSub') Jogos @endslot

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.jogo.create') }}" class="btn btn-primary btn-admin" title="Novo">
                <i class="glyphicon glyphicon-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(count($jogos) > 0)
                {{ $jogos->links() }}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
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
                                <td>{{ $jogo->campeonato->nome }}</td>
                                <td>{{ $jogo->rodada }}ª</td>
                                <td>{{ $jogo->timecasa->nome }}</td>
                                <td>{{ $jogo->placar_casa }}</td>
                                <td>x</td>
                                <td>{{ $jogo->placar_fora }}</td>
                                <td>{{ $jogo->timefora->nome }}</td>
                                <td>{{ \Carbon\Carbon::parse($jogo->inicio)->format('H:i - d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.jogo.show', $jogo->id) }}" class="btn btn-primary" title="Visualizar">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('admin.jogo.edit', $jogo->id) }}" class="btn btn-primary" title="Editar">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $jogos->links() }}
            @endif
        </div>
    </div>
@endcomponent