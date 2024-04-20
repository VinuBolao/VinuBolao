import React from "react";

const Estatisticas = ({ champions, participants }) => {
    return (
        <div>
            <div className="bg-white dark:bg-slate-800 dark:text-slate-300 overflow-hidden shadow-sm sm:rounded-lg">
                {champions.length > 0 ? (
                    <div className="p-3 sm:p-6 border-b border-gray-200 dark:border-gray-600 last:border-none">
                        <div>
                            <h1 className="text-3xl text-center font-bold">Maiores Campeões</h1>
                            <h3 className="text-md text-center text-gray-600 dark:text-gray-400">
                                Os três primeiros colocados ficam em destaque e os demais são listados abaixo.
                            </h3>
                        </div>

                        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 mt-3 sm:mt-6">
                            {champions
                                .filter((c, i) => i <= 2)
                                .map((item, key) => (
                                    <div
                                        key={key}
                                        className="rounded-lg bg-white dark:bg-slate-900 dark:text-slate-30 p-6 shadow-md"
                                    >
                                        <div className="flex items-center">
                                            <h3 className="text-xl font-bold text-gray-900 dark:text-gray-100">
                                                {item.user.name}
                                            </h3>
                                        </div>
                                        <div className="mt-4 space-y-2">
                                            <div className="flex items-center justify-between">
                                                <span className="text-gray-600 dark:text-gray-400">Vitórias:</span>
                                                <span className="font-bold text-gray-600 dark:text-gray-400">
                                                    {item.quantidade}
                                                </span>
                                            </div>
                                            <div className="flex items-center justify-between">
                                                <span className="text-gray-600 dark:text-gray-400">Participações:</span>
                                                <span className="font-bold text-gray-600 dark:text-gray-400">
                                                    {item.participacoes.length}
                                                </span>
                                            </div>
                                            <div className="flex items-center justify-between">
                                                <span className="text-gray-600 dark:text-gray-400">
                                                    Aproveitamento:
                                                </span>
                                                <span className="font-bold text-gray-600 dark:text-gray-400">
                                                    {" "}
                                                    {item.participacoes.length > 0
                                                        ? ((item.quantidade / item.participacoes.length) * 100).toFixed(
                                                              0
                                                          )
                                                        : 0}
                                                    %
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                        </div>

                        <div className="flex flex-row border-b-2 py-2 font-bold bg-slate-800 dark:border-slate-500 dark:bg-slate-900 text-white rounded-t-lg mt-3 sm:mt-6">
                            <div className="w-[10%] text-center">#</div>
                            <div className="w-[38%] truncate">Participante</div>
                            <div className="w-[14%] text-center truncate">Quantidade</div>
                            <div className="w-[14%] text-center truncate">Participações</div>
                            <div className="w-[14%] text-center truncate">Aproveitamento</div>
                        </div>

                        {champions
                            .filter((c, i) => i > 2)
                            .map((item, key) => (
                                <div key={key} id="classificacao">
                                    <div className="w-[10%] text-center">
                                        <span>{key + 4}º</span>
                                    </div>
                                    <div className="w-[38%] font-bold truncate">
                                        <span>{item.user.name}</span>
                                    </div>
                                    <div className="w-[14%] text-center font-bold">
                                        <span>{item.quantidade}</span>
                                    </div>
                                    <div className="w-[14%] text-center font-bold">
                                        <span>{item.participacoes.length}</span>
                                    </div>
                                    <div className="w-[14%] text-center font-bold">
                                        <span>
                                            {item.participacoes.length > 0
                                                ? ((item.quantidade / item.participacoes.length) * 100).toFixed(0)
                                                : 0}
                                            %
                                        </span>
                                    </div>
                                </div>
                            ))}
                    </div>
                ) : (
                    <div id="box-empty">Não existem dados para listar!</div>
                )}{" "}
            </div>

            <div className="bg-white dark:bg-slate-800 dark:text-slate-300 overflow-hidden shadow-sm sm:rounded-lg mt-3 sm:mt-6">
                {participants.length > 0 ? (
                    <div className="p-3 sm:p-6 border-b border-gray-200 dark:border-gray-600 last:border-none">
                        <div>
                            <h1 className="text-3xl text-center font-bold">Maiores Pontuadores</h1>
                            <h3 className="text-md text-center text-gray-600 dark:text-gray-400">
                                A lista abaixo mostra os participantes somando os pontos ganhos em todas as edições dos
                                bolões.
                            </h3>
                        </div>

                        <div className="flex flex-row border-b-2 py-2 font-bold bg-slate-800 dark:border-slate-500 dark:bg-slate-900 text-white rounded-t-lg mt-3 sm:mt-6">
                            <div className="w-[10%] text-center">#</div>
                            <div className="w-[38%] truncate">Participante</div>
                            <div className="w-[14%] text-center">PG</div>
                            <div className="w-[12%] text-center">PE</div>
                            <div className="w-[12%] text-center">PV</div>
                            <div className="w-[14%] text-center">DP</div>
                        </div>

                        {participants.map((participant, key) => (
                            <div key={key} id="classificacao">
                                <div className="w-[10%] text-center">
                                    <span>{key + 1}º</span>
                                </div>
                                <div className="w-[38%] font-bold truncate">
                                    <span>{participant.name}</span>
                                </div>
                                <div className="w-[14%] text-center font-bold">
                                    <span>{participant.pontosganhos}</span>
                                </div>
                                <div className="w-[12%] text-center">
                                    <span>{participant.placarexato}</span>
                                </div>
                                <div className="w-[12%] text-center">
                                    <span>{participant.placarvencedor}</span>
                                </div>
                                <div className="w-[14%] text-center">
                                    <span>{participant.pontosganhos - participants[0].pontosganhos}</span>
                                </div>
                            </div>
                        ))}
                    </div>
                ) : (
                    <div id="box-empty">Não existem dados para listar!</div>
                )}
            </div>
        </div>
    );
};

export default Estatisticas;
