@component('layouts.app')
    @slot('title') Jogos @endslot

    <div class="col-sm-12 box">
        <h2>Jogos</h2>
        <p>Aqui estão os jogos filtrados por campeonato e rodada, preencha os resultados.</p>
    </div>

    <jogo users="{{ $participante }}"></jogo>
@endcomponent