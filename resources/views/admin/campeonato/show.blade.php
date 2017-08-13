@component('layouts.admin')
    @slot('pageTitle') Visualizando @endslot
    @slot('pageSub') Campeonato @endslot

    <div class="row">
        <div class="col-sm-12">
            <div style="margin-bottom: 25px">
                <a href="{{ route('admin.campeonato.edit', $campeonato->id) }}" class="btn btn-primary btn-admin" style="margin-bottom: 0" title="Editar">
                    Editar
                </a>

                <a href="{{ route('admin.campeonato.destroy', ['campeonato' => $campeonato->id]) }}" class="btn btn-danger btn-admin" style="margin-bottom: 0" onclick="event.preventDefault(); document.getElementById('form-delete').submit();">
                    Excluir
                </a>
            </div>

            <form id="form-delete" action="{{ route('admin.campeonato.destroy', ['campeonato' => $campeonato->id]) }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="title-show">Dados do Campeonato</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $campeonato->nome }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome Completo</th>
                        <td>{{ $campeonato->nome_completo }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Total de Times</th>
                        <td>{{ $campeonato->qtd_times }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Total de Rodadas</th>
                        <td>{{ $campeonato->qtd_rodadas }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Rodada Atual</th>
                        <td>{{ $campeonato->rodada }}ª</td>
                    </tr>
                    <tr>
                        <th scope="row">Temporada</th>
                        <td>{{ $campeonato->temporada }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Série</th>
                        <td>{{ $campeonato->serie }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td>{{ $campeonato->estado or '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">País</th>
                        <td>{{ $campeonato->pais }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Começou</th>
                        <td>{{ \Carbon\Carbon::parse($campeonato->inicio)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Termina</th>
                        <td>{{ \Carbon\Carbon::parse($campeonato->termino)->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endcomponent