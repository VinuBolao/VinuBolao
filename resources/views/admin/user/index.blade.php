@component('layouts.admin')
    @slot('pageTitle') Listando @endslot
    @slot('pageSub') Usuários @endslot

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-admin" title="Novo">
                <i class="glyphicon glyphicon-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if(count($users) > 0)
                {{ $users->appends(request()->query())->links() }}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="label {{ $user->master ? 'label-primary' : 'label-default' }}">
                                        {{ $user->master ? 'admin' : 'normal' }}
                                    </span>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-primary" title="Visualizar">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary" title="Editar">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
@endcomponent