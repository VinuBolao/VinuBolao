@component('layouts.app')
    @slot('title') Jogos @endslot

    <div class="col-sm-12 box">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Jogos</h2>
                <p>Lista de jogos do bolão <strong>{{ $bolao->nome or '' }}</strong> filtrados por campeonato e rodada, preencha os resultados.</p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-dark"></i>
            </div>
        </div>
    </div>

    <jogo users="{{ $participante->user or null }}" data_bolao="{{ $bolao }}"></jogo>
@endcomponent