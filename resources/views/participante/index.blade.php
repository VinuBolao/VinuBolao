@component('layouts.app')
    @slot('title') Participantes @endslot

    <div class="col-sm-12 box">
        <h2>Lista</h2>
        <p>Veja a lista dos outros participantes!</p>
    </div>

    <participante data="{{ $boloes }}"></participante>
@endcomponent