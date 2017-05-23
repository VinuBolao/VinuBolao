@component('layouts.app')

    <div class="col-md-12 box">
        <a href="" class="btn btn-primary" role="button">Novo</a>
        <h2>Lista</h2>
        <p>Veja sua posição em relação aos outros participantes!</p>
    </div>

    <div class="col-sm-12 box">
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
