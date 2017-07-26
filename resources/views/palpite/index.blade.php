@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <h2>Palpites</h2>
        <p>Insira seus palpites para a rodada vigente, lembrando que os palpites devem ser inseridos com pelo menos <strong>15 minutos</strong> de antecedência ao início da rodada.</p>
    </div>

    <palpites bolao="{{ $bolao }}"></palpites>
@endcomponent