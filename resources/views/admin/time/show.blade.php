@component('layouts.admin')
    @slot('pageTitle') Visualizando @endslot
    @slot('pageSub') Time @endslot

    <div class="row">
        <div class="col-sm-12">
            <div style="margin-bottom: 25px">
                <a href="{{ route('admin.time.edit', $time->id) }}" class="btn btn-secondary btn-admin" style="margin-bottom: 0" title="Editar">
                    Editar
                </a>

                <a href="{{ route('admin.time.destroy', ['time' => $time->id]) }}" class="btn btn-danger btn-admin" style="margin-bottom: 0" onclick="event.preventDefault(); document.getElementById('form-delete').submit();">
                    Excluir
                </a>
            </div>

            <form id="form-delete" action="{{ route('admin.time.destroy', ['time' => $time->id]) }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="title-show">Dados do Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $time->nome }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Nome Completo</th>
                        <td>{{ $time->nome_completo }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Sigla</th>
                        <td>{{ $time->sigla }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Estádio</th>
                        <td>{{ $time->estadio }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Estado</th>
                        <td>{{ $time->estado }}</td>
                    </tr>

                    <tr>
                        <th scope="row">País</th>
                        <td>{{ $time->pais }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endcomponent