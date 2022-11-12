<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Regulamento') }}
            </h2>

            <p class="pt-2 text-gray-500">
                Veja as regras, critérios que usamos para pontuação e outras informações importantes.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-600 p-3 sm:p-6">
                <div class="border-b-2 border-gray-100">
                    <h4 class="py-2 text-lg">CLASSIFICAÇÃO</h4>

                    <p class="font-bold">Como funciona:</p>

                    <ul class="py-2 pl-12">
                        <li class="list-disc">
                            Será feito o cálculo dos pontos de cada jogo somente se o placar do mesmo estiver preenchido na página de jogo e de palpite.
                        </li>
                        <li class="list-disc">Clicando em uma rodada especifica o cálculo é feito apenas para aquela rodada.</li>
                    </ul>
                </div>

                <div class="py-6 border-b-2 border-gray-100">
                    <h4 class="py-2 text-lg">JOGO</h4>

                    <p class="font-bold">Como funciona:</p>

                    <ul class="py-2 pl-12">
                        <li class="list-disc">
                            Somente os administradores do bolão podem adicionar ou alterar os resultados dos jogos.
                        </li>
                        <li class="list-disc">
                            O resultado de cada jogo pode ser alterado a qualquer momento.
                        </li>
                    </ul>
                </div>

                <div class="py-6 border-b-2 border-gray-100">
                    <h4 class="py-2 text-lg">PALPITE</h4>

                    <p class="font-bold">Como funciona:</p>

                    <ul class="py-2 pl-12">
                        <li class="list-disc">Será possível adicionar ou alterar os seus palpites somente antes do horário inicial de cada jogo.</li>
                        <li class="list-disc">Após o horário inicial de cada jogo os campos serão bloqueados.</li>
                        <li class="list-disc">É possível ver os palpites de outros participantes a qualquer momento.</li>
                        <li class="list-disc">Cada participante pode adicionar ou alterar somente os seus próprios palpites.</li>
                    </ul>
                </div>

                <div class="py-6 border-b-2 border-gray-100">
                    <h4 class="py-2 text-lg">PONTUAÇÃO</h4>

                    <h5 class="font-bold">Apostando que a partida terá um vencedor</h5>

                    <ul class="py-2 pl-12">
                        <li class="list-disc">Acertando o Placar Exato = 10 pontos.</li>
                        <li class="list-disc">Acertando o Time Vencedor = 7 pontos.</li>
                    </ul>

                    <h5 class="font-bold">Apostando que a partida terminará empatada</h5>

                    <ul class="py-2 pl-12">
                        <li class="list-disc">Acertando o Placar Exato = 10 pontos.</li>
                        <li class="list-disc">Qualquer outro empate NÃO EXATO = 7 pontos.</li>
                    </ul>
                </div>

                <div class="py-6">
                    <h4 class="py-2 text-lg">CRITÉRIO DE DESEMPATE</h4>

                    <p class="font-bold">
                        Se ao final do campeonato dois ou mais participantes estiverem com a mesma quantidade de pontos,
                        serão considerados os seguintes critérios:
                    </p>

                    <ol class="py-2 pl-12" type="I">
                        <li class="list-[upper-roman]">O maior número de Placares Exatos</li>
                        <li class="list-[upper-roman]">O maior número de Placar Vencedor</li>
                        <li class="list-[upper-roman]">Sorteio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
