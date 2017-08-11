@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <h2>Palpites <i class="flaticon-checklist-on-a-paper-with-a-pencil"></i></h2>
        <p>Insira seus palpites para a rodada vigente, lembrando que os palpites devem ser inseridos com pelo menos <strong>15 minutos</strong> de antecedência ao início da rodada.</p>
    </div>

    <palpites users="{{ $participante->user or null }}"></palpites>
@endcomponent