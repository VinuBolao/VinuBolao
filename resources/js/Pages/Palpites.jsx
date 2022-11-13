import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { EditIcon, ArrowDownIcon, ArrowLeftIcon, CircleXisIcon, ArrowRightIcon, CircleCheckIcon } from "../helpers";

const Palpites = ({ user, bolao, jogos, rodada, participantes, selected }) => {
    const [loading, setLoading] = useState(false);
    const [dropdown, setDropdown] = useState(false);
    const [palpite, setPalpite] = useState({ jogo: 0, casa: null, fora: null });

    const handleChange = (e, jogo) => {
        if (palpite.jogo === 0 || jogo.id === palpite.jogo) {
            setPalpite({
                ...palpite,
                jogo: jogo.id,
                [e.target.name.split("_")[1]]: +e.target.value,
            });
        }
    };

    const handleSelect = (e) => {
        if (e.target.value > 0) {
            let uri = `/palpites?participante=${e.target.value}`;

            if (window.location.search.includes("rodada")) {
                uri += `&rodada=${rodada}`;
            }

            Inertia.get(uri);
        }
    };

    const handleBlur = (e, jogo) => {
        if (jogo.id === palpite.jogo && palpite.casa !== null && palpite.fora !== null) {
            handleSave(jogo);
        }
    };

    const handleRodada = (value) => {
        if (value > 0) {
            let uri = `/palpites?rodada=${value}`;

            setDropdown(false);

            if (window.location.search.includes("participante")) {
                uri += `&participante=${selected}`;
            }

            Inertia.get(uri);
        }
    };

    const handleSave = (jogo) => {
        const data = {
            jogo_id: jogo.id,
            user_id: user.id,
            inicio_jogo: jogo.inicio,
            palpite_casa: palpite.casa,
            palpite_fora: palpite.fora,
        };

        if (jogo.palpite) {
            Inertia.visit(`/palpites/${jogo.palpite.id}`, {
                method: "PUT",
                data: data,
                preserveScroll: true,
                onStart: () => setLoading(true),
                onFinish: () => setLoading(false),
            });
        } else {
            Inertia.visit(`/palpites`, {
                method: "POST",
                data: data,
                preserveScroll: true,
                onStart: () => setLoading(true),
                onFinish: () => setLoading(false),
            });
        }
    };

    const isExpired = ({ inicio, palpite }) => {
        const isPalpiteCasa = palpite && palpite.palpite_casa !== null;
        const isPalpiteFora = palpite && palpite.palpite_fora !== null;

        if (!isPalpiteCasa && !isPalpiteFora && gameStarted(inicio)) {
            return true;
        }

        return false;
    };

    const showInput = ({ palpite }, type) => {
        const isUser = user.id === +selected;
        const show = palpite === null || palpite[`palpite_${type}`] === null;

        return isUser && show;
    };

    const gameStarted = (value) => {
        return new Date() > new Date(value);
    };

    const isShowEdit = (jogo) => {
        if (user.id === +selected && jogo.palpite) {
            const isPalpiteCasa = jogo.palpite.palpite_casa !== null;
            const isPalpiteFora = jogo.palpite.palpite_fora !== null;

            if (isPalpiteCasa && isPalpiteFora && !gameStarted(jogo.inicio)) {
                return true;
            }
        }

        return false;
    };

    const checkPalpite = ({ placar_casa, placar_fora, palpite }) => {
        const isPlacarCasa = placar_casa !== null;
        const isPlacarFora = placar_fora !== null;
        const isPalpiteCasa = palpite && palpite.palpite_casa !== null;
        const isPalpiteFora = palpite && palpite.palpite_fora !== null;

        if (isPlacarCasa && isPlacarFora && isPalpiteCasa && isPalpiteFora) {
            const pCasa = palpite.palpite_casa;
            const pFora = palpite.palpite_fora;
            const equalsCasa = placar_casa === palpite.palpite_casa;
            const equalsFora = placar_fora === palpite.palpite_fora;
            const winnerCasa = placar_casa > placar_fora && pCasa > pFora;
            const winnerFora = placar_fora > placar_casa && pFora > pCasa;
            const isTied = placar_casa === placar_fora && pCasa === pFora;

            if (equalsCasa && equalsFora) {
                return "flex flex-col gap-1 bg-green-100";
            } else if (winnerCasa || winnerFora || isTied) {
                return "flex flex-col gap-1 bg-yellow-50";
            }
        } else {
            return "flex flex-col gap-1";
        }
    };

    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-600">
            {(jogos.length > 0 || rodada > 0) && (
                <div className="flex flex-wrap-reverse items-center justify-between">
                    <div>
                        <div className={dropdown ? "vb-btn-group open" : "vb-btn-group"}>
                            <button onClick={() => handleRodada(+rodada - 1)} disabled={+rodada === 1}>
                                {ArrowLeftIcon}
                            </button>
                            <button onClick={() => setDropdown(!dropdown)}>
                                <span className="flex items-center justify-center">
                                    {rodada}ª Rodada {ArrowDownIcon}
                                </span>
                            </button>
                            <button onClick={() => handleRodada(+rodada + 1)} disabled={bolao.qtd_rodadas === +rodada}>
                                {ArrowRightIcon}
                            </button>
                        </div>

                        {dropdown && (
                            <div className="vb-dropdown">
                                {[...Array(bolao.qtd_rodadas).keys()].map((item, key) => (
                                    <button key={key} onClick={() => handleRodada(item + 1)}>
                                        {item + 1}ª
                                    </button>
                                ))}
                            </div>
                        )}
                    </div>

                    <div className="w-[18.5rem] p-3 pb-0 sm:px-6 sm:pt-6">
                        <select
                            name="users"
                            onChange={handleSelect}
                            defaultValue={selected}
                            className="vb-custom-input"
                        >
                            {participantes.map((item, key) => (
                                <option key={key} value={item.user_id}>
                                    {item.name}
                                </option>
                            ))}
                        </select>
                    </div>
                </div>
            )}

            {jogos.length > 0 ? (
                <div className="p-3 sm:p-6 border-gray-200">
                    <div className="flex justify-between flex-row border-b-2 p-2 font-bold bg-slate-800 text-white rounded-t-lg">
                        <div className="px-2 text-center">Status</div>
                        <div className="px-2 flex text-center truncate">Palpites</div>
                        <div className="px-2 text-center">Ações</div>
                    </div>

                    {jogos.map((jogo, key) => (
                        <div key={key} className={checkPalpite(jogo)}>
                            <div className="flex text-sm justify-center pt-2 gap-1">
                                <strong className="capitalize">{loading ? "Salvando..." : jogo.inicio_format}</strong>
                            </div>

                            <div className="flex items-center justify-between border-b-2 pb-2 gap-2">
                                <div className="text-center">
                                    {jogo.palpite &&
                                    (jogo.palpite.palpite_casa !== null || jogo.palpite.palpite_fora !== null)
                                        ? CircleCheckIcon
                                        : CircleXisIcon}
                                </div>

                                <div className="flex items-center justify-center gap-2">
                                    <div className="flex items-center gap-2">
                                        <span className="vb-sigla-time">{jogo.timecasa.sigla}</span>
                                        <span className="w-24 hidden sm:flex justify-end">{jogo.timecasa.nome}</span>

                                        <img
                                            alt={jogo.timecasa.nome}
                                            className="vb-escudo-time"
                                            src={jogo.timecasa.escudo_url}
                                        />
                                    </div>

                                    <div className="flex items-center gap-2">
                                        {showInput(jogo, "casa") ? (
                                            <input
                                                min="0"
                                                type="number"
                                                name="palpite_casa"
                                                className="vb-input-jogos"
                                                onBlur={(e) => handleBlur(e, jogo)}
                                                disabled={loading || isExpired(jogo)}
                                                onChange={(e) => handleChange(e, jogo)}
                                            ></input>
                                        ) : (
                                            <span className="vb-placar-number">
                                                {user.id !== +selected && !gameStarted(jogo.inicio)
                                                    ? jogo.palpite
                                                        ? "X"
                                                        : ""
                                                    : jogo?.palpite?.palpite_casa}
                                            </span>
                                        )}

                                        <span>x</span>
                                        {user.id === +selected && isExpired(jogo) && (
                                            <strong className="vb-expired">Esgotado!</strong>
                                        )}

                                        {showInput(jogo, "fora") ? (
                                            <input
                                                min="0"
                                                type="number"
                                                name="palpite_fora"
                                                className="vb-input-jogos"
                                                onBlur={(e) => handleBlur(e, jogo)}
                                                disabled={loading || isExpired(jogo)}
                                                onChange={(e) => handleChange(e, jogo)}
                                            ></input>
                                        ) : (
                                            <span className="vb-placar-number">
                                                {user.id !== +selected && !gameStarted(jogo.inicio)
                                                    ? jogo.palpite
                                                        ? "X"
                                                        : ""
                                                    : jogo?.palpite?.palpite_fora}
                                            </span>
                                        )}
                                    </div>

                                    <div className="flex items-center gap-2">
                                        <img
                                            alt={jogo.timefora.nome}
                                            className="vb-escudo-time"
                                            src={jogo.timefora.escudo_url}
                                        />

                                        <span className="w-24 hidden sm:flex">{jogo.timefora.nome}</span>
                                        <span className="vb-sigla-time">{jogo.timefora.sigla}</span>
                                    </div>
                                </div>

                                <div className="w-6">
                                    {isShowEdit(jogo) && <button onClick={() => handleSave(jogo)}>{EditIcon}</button>}
                                </div>
                            </div>
                        </div>
                    ))}

                    <div className="pt-9">
                        <h4 className="font-bold text-lg pb-1">Legenda</h4>
                        <div className="flex items-center gap-1">
                            <span className="w-4 h-4 bg-green-100 border-[1px] border-gray-400" />
                            <p>- Placar Exato ({bolao.placar_exato} pontos)</p>
                        </div>

                        <div className="flex items-center gap-1">
                            <span className="w-4 h-4 bg-yellow-50 border-[1px] border-gray-400" />
                            <p>- Placar Vencedor ({bolao.placar_vencedor} pontos)</p>
                        </div>
                    </div>
                </div>
            ) : (
                <div id="box-empty">Não existem dados para listar!</div>
            )}
        </div>
    );
};

export default Palpites;
