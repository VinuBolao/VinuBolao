@component('layouts.app')
    @slot('title') Jogos @endslot

    <div class="col-sm-12 box">
        <h2>Jogos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi!</p>
    </div>

    <div class="col-sm-12 box">
        <div class="btn-group" role="group">
            <form class="form-inline">
                <div class="form-group">
                    <label for="infoCampeonato">Campeonato:</label>
                    <select id="infoCampeonato" class="form-control">
                        @foreach($campeonatos as $campeonato)
                            <option value="{{ $campeonato->id }}">{{ $campeonato->nome_completo }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ route('jogo.index', [$camp_id, $rodada-1]) }}" class="btn btn-default">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            </a>
            <button type="button" class="btn btn-default">
                {{ $rodada }}ª Rodada
            </button>
            <a href="{{ route('jogo.index', [$camp_id, $rodada+1]) }}" class="btn btn-default">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12 box">
        <table class="table table-striped">
            <tr style="background-color: #666; color: #fff;">
                <th colspan="3">Jogo</th>
                <th class="hidden-xs">Horário | Estádio</th>
            </tr>
            @foreach($jogos as $jogo)
                <tr>
                    <td class="text-right">
                        {{ $jogo->timecasa->nome }}
                    </td>
                    <td style="width: 101px">
                        <input form="formPalpites" name="jogo[{{ $jogo->id }}][palpite_casa]" type="number" min="0" style="width: 35px;"> x
                        <input form="formPalpites" name="jogo[{{ $jogo->id }}][palpite_fora]" type="number" min="0" style="width: 35px;">
                    </td>
                    <td class="text-left">
                        <img src="" alt="">
                        {{ $jogo->timefora->nome }}
                    </td>
                    <td class="hidden-xs">
                        {{ \Carbon\Carbon::parse($jogo->inicio)->format('H:m - d/m/y') }} | {{ $jogo->timecasa->estadio or 'Estádio' }}
                    </td>
                </tr>
            @endforeach
        </table>

        <form id="formPalpites" action="" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endcomponent