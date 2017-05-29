@component('layouts.app')
    @slot('title') Home @endslot

    <div class="col-md-12 box">
        <a href="{{ route('bolao.create') }}" class="btn btn-primary" role="button">Novo</a>
        <h2>Lista</h2>
        <p>Veja sua posição em relação aos outros participantes!</p>
    </div>

    <div class="col-sm-12 box">
        @if(!$boloes->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Administrador</th>
                    <th>Nome</th>
                    <th>Campeonato</th>
                    <th>Data Inicial</th>
                    <th>Descrição</th>
                    <th colspan="3"></th>
                </tr>
                </thead>
                @foreach($boloes as $bolao)
                    <tbody>
                    <tr>
                        <td>{{ $bolao->user->name }}</td>
                        <td>{{ $bolao->nome }}</td>
                        <td>{{ $bolao->campeonato->nome }} - Série {{ $bolao->campeonato->serie }}</td>
                        <td>{{ $bolao->inicio }}</td>
                        <td>{{ $bolao->descricao }}</td>
                        <td>
                            <a href="" class="btn btn-xs btn-primary">Adicionar Participante</a>
                        </td>
                        <td>
                            <a href="{{ route('bolao.edit', $bolao->id) }}" class="btn btn-xs btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('bolao.destroy', $bolao->id) }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="remover" class="btn btn-xs btn-danger">
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div class="alert alert-danger">
                <p class="text-center">Não existe produtos para listar!</p>
            </div>
        @endif
    </div>
@endcomponent
