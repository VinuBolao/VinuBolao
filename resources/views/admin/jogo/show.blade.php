@component('layouts.admin')
    @slot('pageTitle') Visualizando @endslot
    @slot('pageSub') Jogo @endslot

    <div class="row">
        <div class="col-sm-12">
            <div style="margin-bottom: 25px">
                <a href="{{ route('admin.jogo.edit', $jogo->id) }}" class="btn btn-primary btn-admin" style="margin-bottom: 0" title="Editar">
                    Editar
                </a>

                <a href="{{ route('admin.jogo.destroy', ['jogo' => $jogo->id]) }}" class="btn btn-danger btn-admin" style="margin-bottom: 0" onclick="event.preventDefault(); document.getElementById('form-delete').submit();">
                    Excluir
                </a>
            </div>

            <form id="form-delete" action="{{ route('admin.jogo.destroy', ['jogo' => $jogo->id]) }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="title-show">Dados do Jogo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Campeonato</th>
                        <td>{{ $jogo->campeonato->nome }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Rodada</th>
                        <td>{{ $jogo->rodada }}ª</td>
                    </tr>
                    <tr>
                        <th scope="row">Mandante</th>
                        <td>{{ $jogo->timecasa->nome }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Placar Mandante</th>
                        <td>{{ $jogo->placar_casa }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Placar Visitante</th>
                        <td>{{ $jogo->placar_fora }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Visitante</th>
                        <td>{{ $jogo->timefora->nome }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Início</th>
                        <td>{{ \Carbon\Carbon::parse($jogo->inicio)->format('H:i - d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endcomponent