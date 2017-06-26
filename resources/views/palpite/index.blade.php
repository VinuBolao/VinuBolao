@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <h2>Palpites</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi!</p>
    </div>

    <palpites user="{{ Auth::user() }}"></palpites>
@endcomponent