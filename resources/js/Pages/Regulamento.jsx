import React from "react";

const Regulamento = ({ bolao }) => {
    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-3 sm:p-6 border-b border-gray-200">
                <div className="border-b-2 border-gray-100">
                    <h4 className="py-2 text-lg">CLASSIFICAÇÃO</h4>

                    <p className="font-bold">Como funciona:</p>

                    <ul className="py-2 pl-12">
                        <li className="list-disc">
                            Será feito o cálculo dos pontos de cada jogo somente se o placar do mesmo estiver preenchido
                            na página de jogo e de palpite.
                        </li>
                        <li className="list-disc">
                            Clicando em uma rodada especifica o cálculo é feito apenas para aquela rodada.
                        </li>
                    </ul>
                </div>

                <div className="py-6 border-b-2 border-gray-100">
                    <h4 className="py-2 text-lg">JOGO</h4>

                    <p className="font-bold">Como funciona:</p>

                    <ul className="py-2 pl-12">
                        <li className="list-disc">
                            Somente os administradores do bolão podem adicionar ou alterar os resultados dos jogos.
                        </li>
                        <li className="list-disc">O resultado de cada jogo pode ser alterado a qualquer momento.</li>
                    </ul>
                </div>

                <div className="py-6 border-b-2 border-gray-100">
                    <h4 className="py-2 text-lg">PALPITE</h4>

                    <p className="font-bold">Como funciona:</p>

                    <ul className="py-2 pl-12">
                        <li className="list-disc">
                            Será possível adicionar ou alterar os seus palpites somente antes do horário inicial de cada
                            jogo.
                        </li>
                        <li className="list-disc">Após o horário inicial de cada jogo os campos serão bloqueados.</li>
                        <li className="list-disc">
                            É possível ver os palpites de outros participantes a qualquer momento.
                        </li>
                        <li className="list-disc">
                            Cada participante pode adicionar ou alterar somente os seus próprios palpites.
                        </li>
                    </ul>
                </div>

                <div className="py-6 border-b-2 border-gray-100">
                    <h4 className="py-2 text-lg">PONTUAÇÃO</h4>

                    <h5 className="font-bold">Apostando que a partida terá um vencedor</h5>

                    <ul className="py-2 pl-12">
                        <li className="list-disc">Acertando o Placar Exato = {bolao.placar_exato} pontos.</li>
                        <li className="list-disc">Acertando o Time Vencedor = {bolao.placar_vencedor} pontos.</li>
                    </ul>

                    <h5 className="font-bold">Apostando que a partida terminará empatada</h5>

                    <ul className="py-2 pl-12">
                        <li className="list-disc">Acertando o Placar Exato = {bolao.placar_exato} pontos.</li>
                        <li className="list-disc">Qualquer outro empate NÃO EXATO = {bolao.placar_vencedor} pontos.</li>
                    </ul>
                </div>

                <div className="py-6">
                    <h4 className="py-2 text-lg">CRITÉRIO DE DESEMPATE</h4>

                    <p className="font-bold">
                        Se ao final do campeonato dois ou mais participantes estiverem com a mesma quantidade de pontos,
                        serão considerados os seguintes critérios:
                    </p>

                    <ol className="py-2 pl-12" type="I">
                        <li className="list-[upper-roman]">O maior número de Placares Exatos</li>
                        <li className="list-[upper-roman]">O maior número de Placar Vencedor</li>
                        <li className="list-[upper-roman]">Sorteio</li>
                    </ol>
                </div>
            </div>
        </div>
    );
};

export default Regulamento;
