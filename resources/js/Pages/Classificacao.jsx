import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { ArrowDownIcon, ArrowLeftIcon, ArrowRightIcon } from "../helpers";

const Classificacao = ({ bolao, participantes, rodada, turno }) => {
    const [dropdown, setDropdown] = useState(false);

    const handleRodada = (value) => {
        if (value >= 0) {
            setDropdown(false);
            Inertia.get(`/classificacao?rodada=${value}`);
        }
    };

    const handleSeason = (type) => {
        setDropdown(false);

        if (type >= 0) {
            Inertia.get(`/classificacao${type > 0 ? `?turno=${type}` : ""}`);
        }
    };

    return (
        <div className="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg text-gray-600 dark:text-slate-100">
            {(participantes.length > 0 || rodada > 0 || turno > 0) && (
                <>
                    <div className={dropdown ? "vb-btn-group open" : "vb-btn-group"}>
                        <button onClick={() => handleRodada(+rodada - 1)} disabled={+rodada <= 1}>
                            {ArrowLeftIcon}
                        </button>
                        <button onClick={() => setDropdown(!dropdown)}>
                            <span className="flex items-center justify-center">
                                {turno && `${turno}º Turno`}
                                {rodada && `${rodada}ª Rodada`}
                                {!turno && !rodada && "Classificação Geral"}
                                {ArrowDownIcon}
                            </span>
                        </button>
                        <button onClick={() => handleRodada(+rodada + 1)} disabled={bolao.qtd_rodadas === +rodada}>
                            {ArrowRightIcon}
                        </button>
                    </div>

                    {dropdown && (
                        <div className="vb-dropdown">
                            <button className="col-span-4" onClick={() => handleSeason(0)}>
                                Geral
                            </button>
                            <button className="col-span-2" onClick={() => handleSeason(1)}>
                                1º turno
                            </button>
                            <button className="col-span-2" onClick={() => handleSeason(2)}>
                                2º turno
                            </button>

                            {[...Array(bolao.qtd_rodadas).keys()].map((item, key) => (
                                <button key={key} onClick={() => handleRodada(item + 1)} className={bolao.rodada === (item + 1) ? "active" : ""}>
                                    {item + 1}ª
                                </button>
                            ))}
                        </div>
                    )}
                </>
            )}

            {participantes.length > 0 ? (
                <div className="p-3 sm:p-6 border-b border-gray-200 last:border-none">
                    <div className="flex flex-row border-b-2 py-2 font-bold bg-slate-800 dark:border-slate-500 dark:bg-slate-900 text-white rounded-t-lg">
                        <div className="w-[10%] text-center">#</div>
                        <div className="w-[38%] truncate">Participante</div>
                        <div className="w-[14%] text-center">PG</div>
                        <div className="w-[12%] text-center">PE</div>
                        <div className="w-[12%] text-center">PV</div>
                        <div className="w-[14%] text-center">DP</div>
                    </div>

                    {participantes.map((participante, key) => (
                        <div
                            key={key}
                            id="classificacao"
                            className={`${!+rodada && key <= 2 && "vb-winners"} ${
                                !+rodada && key > participantes.length - 3 && "vb-losers"
                            }`}
                        >
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
                                <span>{participante.pontosganhos - participantes[0].pontosganhos}</span>
                            </div>
                        </div>
                    ))}

                    <div className="pt-9">
                        <h4 className="font-bold text-lg pb-1">Legenda</h4>

                        <div className="flex items-center gap-1">
                            <span className="w-4 h-4 bg-green-900 border-[1px] border-gray-400" />
                            <p>- Ganhadores</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <span className="w-4 h-4 bg-red-900 border-[1px] border-gray-400" />
                            <p>- Lanternas</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <strong>PG</strong>
                            <p>- Pontos Ganhos</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <strong>PE</strong>
                            <p>- Placar Exato</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <strong>PV</strong>
                            <p>- Placar Vencedor</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <strong>DP</strong>
                            <p>- Diferença de Pontos para o primeiro</p>
                        </div>
                    </div>
                </div>
            ) : (
                <div id="box-empty">Não existem dados para listar!</div>
            )}
        </div>
    );
};

export default Classificacao;
