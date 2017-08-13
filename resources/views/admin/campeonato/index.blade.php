@component('layouts.admin')
    @slot('pageTitle') Listando @endslot
    @slot('pageSub') Campeonatos @endslot

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.campeonato.create') }}" class="btn btn-primary btn-admin" title="Novo">
                <i class="glyphicon glyphicon-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(count($campeonatos) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Nome Completo</th>
                            <th>Rodada Atual</th>
                            <th>Começa</th>
                            <th>Termina</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campeonatos as $key => $campeonato)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $campeonato->nome }} - {{ $campeonato->temporada }} - Série {{ $campeonato->serie }}</td>
                                <td>{{ $campeonato->nome_completo }}</td>
                                <td>{{ $campeonato->rodada }}ª</td>
                                <td>{{ \Carbon\Carbon::parse($campeonato->inicio)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($campeonato->termino)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.campeonato.show', $campeonato->id) }}" class="btn btn-primary" title="Visualizar">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('admin.campeonato.edit', $campeonato->id) }}" class="btn btn-primary" title="Editar">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $campeonatos->links() }}
            @endif
        </div>
    </div>
@endcomponent