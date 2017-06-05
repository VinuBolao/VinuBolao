@component('layouts.app')
    @slot('title') Classificação @endslot

    <div class="col-sm-12 box">
        <h2>Classificação</h2>
        <p>Veja sua posição em relação aos outros participantes!</p>
    </div>

    @if(!$participantes->isEmpty())
        <div class="col-sm-12 box">
            <table class="table table-striped table-hover">
                <tr style="background-color: #666; color: #fff;">
                    <th><strong>Posição</strong></th>
                    <th><strong>Participante</strong></th>
                    <th><strong>PG</strong></th>
                    <th><strong>PE</strong></th>
                    <th><strong>PV</strong></th>
                    <th><strong>V</strong></th>
                </tr>
                @foreach($participantes as $key => $participante)
                    <tr>
                        <td>{{ $key + 1 }}º</td>
                        <td><b>{{ $participante->user->name }}</b></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td><span class="glyphicon glyphicon-stop icon-blue" aria-hidden="true"></span></td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="col-sm-12 box">
            <h4><strong>Legenda</strong></h4>
            <p><strong>PG</strong> - Pontos Ganhos, <strong>PE</strong> - Placar Exato, <strong>PV</strong> - Placar Vencedor, <strong>V</strong> - Variação de posição</p>
        </div>
    @else
        <div class="col-sm-12 box">
            <div class="alert alert-danger">
                <p class="text-center">Você não participa de nenhum bolão ainda.</p>
            </div>
        </div>
    @endif
@endcomponent