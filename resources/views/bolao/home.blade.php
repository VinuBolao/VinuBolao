@component('layouts.app')
    @slot('title')
        Home
    @endslot

    <div class="col-sm-12 box">
        <h2>
            Lista de Bolões
            <a href="" class="btn btn-primary pull-right" role="button">Novo Bolão</a>
        </h2>
        <hr>
        @if(!$boloes->isEmpty())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                </tr>
                </thead>
                @foreach($boloes as $bolao)
                    <tbody>
                    <tr>
                        <td>{{ $bolao->name }}</td>
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
