@component('layouts.admin')
    @slot('pageTitle') Sincronizando @endslot
    @slot('pageSub') Jogos @endslot

    <div class="row">
        <form action="{{ route('admin.sincronizar') }}" method="get">
            <div class="col-md-9 col-sm-12">
                <label for="infoSincronizar">URL:</label>
                <input id="infoSincronizar" name="info" value="{{ request('info') }}" class="form-control" placeholder="Digite...">
            </div>

            <div class="col-md-3 col-sm-12">
                <button type="submit" class="btn btn-primary btn-block btn-admin btn-admin-filter" title="Filtrar">
                    <i class="glyphicon glyphicon-search"></i> Buscar Jogos
                </button>
            </div>
        </form>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <h4><strong>Jogos Encontrados</strong></h4>

            @foreach($jogos as $key => $jogo)
                <div>
                    <span>{{ $key + 1 }} - </span>
                    <strong>{{ $jogo['horario'] }} - </strong>
                    <span>
                        <strong>{{ $jogo['mandante']['nome'] }}</strong> x <strong>{{ $jogo['visitante']['nome'] }}</strong>
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    @if (count($outros) > 0)
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h4><strong>Times Não Encontrados</strong></h4>

                @foreach($outros as  $key => $item)
                    <div>
                        <strong>{{ $key + 1 }} - </strong>
                        <span>{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block btn-admin btn-admin-filter">
                Salvar Jogos
            </button>
        </div>
    </div>
@endcomponent