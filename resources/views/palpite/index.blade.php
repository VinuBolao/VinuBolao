@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Palpites</h2>
                <p>
                    Lista de jogos para você preencher os seus palpites,
                    lembre-se de preencher seu palpite antes do inicio de cada jogo.
                </p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-checklist-on-a-paper-with-a-pencil"></i>
            </div>
        </div>
    </div>

    <palpites users="{{ $participante->user or null }}" currentbolao="{{ $participante->bolao }}"></palpites>
@endcomponent