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
        <h4>CLASSIFICAÇÃO</h4>
        <p>
            <strong>Como funciona:</strong>
        </p>
        <ul>
            <li>Será feito o cálculo dos pontos de cada jogo somente se o placar do mesmo estiver preenchido na página de jogo e
                de palpite.
            </li>
            <li>Clicando em uma rodada especifica o cálculo é feito apenas para aquela rodada.</li>
        </ul>

        <hr><h4>JOGO</h4>
        <p>
            <strong>Como funciona:</strong>
        </p>
        <ul>
            <li>Somente os administradores do bolão podem adicionar ou alterar os resultados dos jogos.</li>
            <li>O resultado de cada jogo pode ser alterado a qualquer momento.</li>
        </ul>

        <hr><h4>PALPITE</h4>
        <p>
            <strong>Como funciona:</strong>
        </p>
        <ul>
            <li>Será possível adicionar ou alterar os seus palpites somente antes do horário inicial de cada jogo.</li>
            <li>Após o horário inicial de cada jogo os campos serão bloqueados.</li>
            <li>É possível ver os palpites de outros participantes a qualquer momento.</li>
            <li>Cada participante pode adicionar ou alterar somente os seus próprios palpites.</li>
        </ul>

        <hr><h4>PONTUAÇÃO</h4>
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

        <hr><h4>CRITÉRIO DE DESEMPATE</h4>
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