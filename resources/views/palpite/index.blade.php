@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Palpites</h2>
                <p>
                    Insira seus palpites para a rodada vigente, lembrando que os palpites devem ser inseridos com pelo menos
                    <strong>15 minutos</strong> de antecedência ao início da rodada.
                </p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-checklist-on-a-paper-with-a-pencil"></i>
            </div>
        </div>
    </div>

    <palpites users="{{ $participante->user or null }}"></palpites>
@endcomponent