@component('layouts.admin')
    @slot('pageTitle') Visualizando @endslot
    @slot('pageSub') Usuário @endslot

    <div class="row">
        <div class="col-sm-12">
            <div style="margin-bottom: 25px">
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary btn-admin" style="margin-bottom: 0" title="Editar">
                    Editar
                </a>

                <a href="{{ route('admin.user.destroy', ['user' => $user->id]) }}" class="btn btn-danger btn-admin" style="margin-bottom: 0" onclick="event.preventDefault(); document.getElementById('form-delete').submit();">
                    Excluir
                </a>
            </div>

            <form id="form-delete" action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="title-show">Dados do Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Usuário</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Administrador</th>
                        <td>{{ $user->master ? 'Sim' : 'Não' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endcomponent