@component('layouts.app')
    @slot('title') Palpites @endslot

    <div class="col-sm-12 box">
        <h2>Palpites</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi!</p>
    </div>

    @if(!$palpites->isEmpty())
        <div class="col-sm-12 box">
            <div class="btn-group pull-left" role="group">
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
            <div class="btn-group pull-right" role="group">
                <a href="" class="btn btn-default">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </a>
                <button type="button" class="btn btn-default">
                    {{ $rodada }}ª Rodada
                </button>
                <a href="" class="btn btn-default">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>

        <div class="col-sm-6 box">
            <div>
                <table class="table table-striped">
                    <tr style="background-color: #666; color: #fff;">
                        <th class="text-center" colspan="3">
                            Gustavo Santos
                        </th>
                    </tr>
                    @foreach($palpites as $palpite)
                        <tr>
                            <td class="text-right">
                                {{ $palpite->jogo->timecasa->nome }}
                            </td>
                            <td class="text-center" style="width: 65px">
                                <b>{{ $palpite->palpite_casa }}</b> x <b>{{ $palpite->palpite_fora }}</b>
                            </td>
                            <td class="text-left">
                                {{ $palpite->jogo->timefora->nome }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-sm-6 box">
            <div>
                <table class="table table-striped">
                    <tr style="background-color: #666; color: #fff;">
                        <th class="text-center" colspan="3">
                            Gustavo Santos
                        </th>
                    </tr>
                    @foreach($palpites as $palpite)
                        <tr>
                            <td class="text-right">
                                {{ $palpite->jogo->timecasa->nome }}
                            </td>
                            <td class="text-center" style="width: 65px">
                                <b>{{ $palpite->palpite_casa }}</b> x <b>{{ $palpite->palpite_fora }}</b>
                            </td>
                            <td class="text-left">
                                {{ $palpite->jogo->timefora->nome }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="col-sm-12 box">
            <div class="alert alert-danger">
                <p class="text-center">Não existe dados para listar!</p>
            </div>
        </div>
    @endif
@endcomponent