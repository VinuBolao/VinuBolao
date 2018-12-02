@component('layouts.app')
    @slot('title') Classificação @endslot

    <div class="col-sm-12 box">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Classificação</h2>
                <p>Veja sua posição em relação aos outros participantes no bolão <strong>{{ $bolao->nome or '' }}!</strong></p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-sports"></i>
            </div>
        </div>
    </div>

    <classificacao data_user="{{ $participante or null }}" data_bolao="{{ $bolao or null }}"></classificacao>
@endcomponent