@component('layouts.app')
    @slot('title') Regulamento @endslot

    <div class="col-sm-12 box">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <h2>Regulamento </h2>
                <p>Confira como participar do VINÚBOLÃO, quais os critérios que usamos para pontuação e outras informações importantes.</p>
            </div>
            <div class="col-sm-3 hidden-xs text-center">
                <i class="icon-page flaticon-checklist"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-12 box">
        <h3>PONTUAÇÃO</h3>
        <h5><strong>Apostando que a partida terá um vencedor</strong></h5>
        <ul>
            <li>Acertando o Placar Exato = 10 pontos.</li>
            <li>Acertando o Time Vencedor = 7 pontos.</li>
        </ul>

        <h5><strong>Apostando que a partida terminará empatada</strong></h5>
        <ul>
            <li>Acertando o Placar Exato = 10 pontos.</li>
            <li>Qualquer outro empate NÃO EXATO = 7 pontos.</li>
        </ul>

        <h3>CRITÉRIO DE DESEMPATE</h3>
        <p>
            <strong>
                Se ao final do campeonato dois ou mais participantes estiverem com a mesma quantidade de pontos,
                serão considerados os seguintes critérios:
            </strong>
        </p>
        <ol type="I">
            <li>O maior número de Placares Exatos</li>
            <li>O maior número de acertos de Time Vencedor</li>
            <li>Sorteio</li>
        </ol>
    </div>


@endcomponent