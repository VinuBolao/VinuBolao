@component('layouts.admin')
    @slot('pageTitle') Listando @endslot
    @slot('pageSub') Times @endslot

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.time.create') }}" class="btn btn-secondary btn-admin" title="Novo">
                <i class="glyphicon glyphicon-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(count($times) > 0)
                {{ $times->appends(request()->query())->links() }}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Nome Completo</th>
                            <th>Sigla</th>
                            <th>Estádio</th>
                            <th>Estado</th>
                            <th>País</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($times as $key => $time)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $time->nome }}</td>
                                <td>{{ $time->nome_completo }}</td>
                                <td>{{ $time->sigla }}</td>
                                <td>{{ $time->estadio }}</td>
                                <td>{{ $time->estado }}</td>
                                <td>{{ $time->pais }}</td>
                                <td>
                                    <a href="{{ route('admin.time.show', $time->id) }}" class="btn btn-secondary" title="Visualizar">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('admin.time.edit', $time->id) }}" class="btn btn-secondary" title="Editar">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $times->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
@endcomponent