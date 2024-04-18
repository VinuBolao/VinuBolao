import React from "react";

const Estatisticas = ({ campeoes }) => {
    console.log(campeoes);
    return (
        <div className="bg-white dark:bg-slate-800 dark:text-slate-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-3 sm:p-6 border-b border-gray-200 last:border-none">
                {campeoes.length > 0 ? (
                    <div className="p-3 sm:p-6 border-b border-gray-200 last:border-none">
                        <h1 className="text-3xl text-center font-bold pb-3 sm:pb-6">Maiores Pontuadores</h1>

                        <div className="flex flex-row border-b-2 py-2 font-bold bg-slate-800 dark:border-slate-500 dark:bg-slate-900 text-white rounded-t-lg">
                            <div className="w-[10%] text-center">#</div>
                            <div className="w-[38%] truncate">Participante</div>
                            <div className="w-[14%] text-center">PG</div>
                            <div className="w-[12%] text-center">PE</div>
                            <div className="w-[12%] text-center">PV</div>
                            <div className="w-[14%] text-center">DP</div>
                        </div>

                        {campeoes.map((participante, key) => (
                            <div key={key} id="classificacao">
                                <div className="w-[10%] text-center">
                                    <span>{key + 1}º</span>
                                </div>
                                <div className="w-[38%] font-bold truncate">
                                    <span>{participante.name}</span>
                                </div>
                                <div className="w-[14%] text-center font-bold">
                                    <span>{participante.pontosganhos}</span>
                                </div>
                                <div className="w-[12%] text-center">
                                    <span>{participante.placarexato}</span>
                                </div>
                                <div className="w-[12%] text-center">
                                    <span>{participante.placarvencedor}</span>
                                </div>
                                <div className="w-[14%] text-center">
                                    <span>{participante.pontosganhos - campeoes[0].pontosganhos}</span>
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
