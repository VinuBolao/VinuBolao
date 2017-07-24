@component('layouts.app')
    @slot('title') Classificação @endslot

    <div class="col-sm-12 box">
        <h2>Classificação</h2>
        <p>Veja sua posição em relação aos outros participantes!</p>
    </div>

    <classificacao></classificacao>
@endcomponent