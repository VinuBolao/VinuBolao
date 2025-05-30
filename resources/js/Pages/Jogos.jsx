import { Inertia } from "@inertiajs/inertia";
import React, {useRef, useState} from "react";
import { ArrowDownIcon, ArrowLeftIcon, ArrowRightIcon, CircleCheckIcon, CircleXisIcon, EditIcon } from "../helpers";

const Jogos = ({ bolao, jogos, rodada, user }) => {
    const [loading, setLoading] = useState(false);
    const [dropdown, setDropdown] = useState(false);
    const [placar, setPlacar] = useState({ jogo: 0, casa: null, fora: null });
    const dropdownRef = useRef();

    const handleChange = (e, jogo) => {
        if (placar.jogo === 0 || jogo.id === placar.jogo) {
            setPlacar({
                ...placar,
                jogo: jogo.id,
                [e.target.name.split("_")[1]]: +e.target.value,
            });
        }
    };

    const handleBlur = (e, jogo) => {
        if (jogo.id === placar.jogo && placar.casa !== null && placar.fora !== null) {
            handleSave(jogo);
        }
    };

    const handleOpen = () => {
        setDropdown(!dropdown);

        if (!dropdown && bolao.rodada > 16) {
            setTimeout(() => {
                dropdownRef.current.scrollTo({
                    top: 48 * (bolao.rodada / 4),
                    behavior: 'smooth'
                });
            }, 500);
        }
    }

    const handleRodada = (value) => {
        if (value > 0) {
            setDropdown(false);
            Inertia.get(`/jogos?rodada=${value}`, {}, { preserveScroll: true });
        }
    };

    const gameStarted = (value) => {
        const dateNow = new Date().getTime();
        return dateNow > value * 1000;
    };

    const handleSave = (jogo) => {
        const data = {
            placar_casa: placar.casa,
            placar_fora: placar.fora,
        };

        Inertia.visit(`/jogos/${jogo.id}`, {
            method: "PUT",
            data: data,
            preserveScroll: true,
            onStart: () => setLoading(true),
            onFinish: () => setLoading(false),
        });
    };

    const handleUpdateRodada = () => {
        Inertia.visit(`/updateRodada/${bolao.campeonato_id}`, {
            method: "PUT",
            data: { rodada },
            preserveScroll: true,
            onStart: () => setLoading(true),
            onFinish: () => setLoading(false),
        });
    };

    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-600 dark:bg-slate-800 dark:text-slate-300">
            {(jogos.length > 0 || rodada > 0) && (
                <div className="flex flex-wrap justify-between">
                    <div>
                        <div className={dropdown ? "vb-btn-group open" : "vb-btn-group"}>
                            <button onClick={() => handleRodada(+rodada - 1)} disabled={+rodada === 1}>
                                {ArrowLeftIcon}
                            </button>
                            <button onClick={handleOpen}>
                                <span className="flex items-center justify-center">
                                    {rodada}ª Rodada {ArrowDownIcon}
                                </span>
                            </button>
                            <button onClick={() => handleRodada(+rodada + 1)} disabled={bolao.qtd_rodadas === +rodada}>
                                {ArrowRightIcon}
                            </button>
                        </div>

                        {dropdown && (
                            <div ref={dropdownRef} className="vb-dropdown">
                                {[...Array(bolao.qtd_rodadas).keys()].map((item, key) => (
                                    <button key={key} onClick={() => handleRodada(item + 1)} className={bolao.rodada === (item + 1) ? "active" : ""}>
                                        {item + 1}ª
                                    </button>
                                ))}
                            </div>
                        )}
                    </div>

                    {(user.master || user.manager) && rodada != bolao.rodada && (
                        <div className="flex p-3 sm:p-6 pb-0 sm:pb-0">
                            <button className="btn-primary" onClick={handleUpdateRodada}>
                                Atual?
                            </button>
                        </div>
                    )}
                </div>
            )}

            {jogos.length > 0 ? (
                <div className="p-3 sm:p-6 border-gray-200">
                    <div className="flex justify-between flex-row border-b-2 p-2 font-bold bg-slate-800 dark:bg-slate-900 text-white rounded-t-lg dark:border-slate-500">
                        <div className="px-2 text-center">Status</div>
                        <div className="px-2 flex text-center truncate">Jogos</div>
                        <div className="px-2 text-center">Ações</div>
                    </div>

                    {jogos.map((jogo, key) => (
                        <div key={key} className="flex flex-col gap-1">
                            <div className="flex text-sm justify-center pt-2 gap-1">
                                {loading ? (
                                    <strong className="capitalize">Salvando...</strong>
                                ) : (
                                    <strong className="capitalize">
                                        {`${bolao.termino} 23:59:00` == jogo.inicio
                                            ? "DATA INDEFINIDA"
                                            : jogo.inicio_format}
                                    </strong>
                                )}
                            </div>

                            <div className="flex items-center justify-between border-b-2 pb-2 gap-2 dark:border-slate-500">
                                <div className="text-center">
                                    {jogo.placar_fora !== null ? CircleCheckIcon : CircleXisIcon}
                                </div>

                                <div className="flex items-center justify-center gap-2">
                                    <div className="flex items-center gap-2">
                                        <span className="vb-sigla-time">{jogo.timecasa.sigla}</span>
                                        <span className="w-48 hidden sm:flex justify-end truncate">
                                            {jogo.timecasa.nome}
                                        </span>

                                        <img
                                            alt={jogo.timecasa.nome}
                                            className="vb-escudo-time"
                                            src={jogo.timecasa.escudo_url}
                                        />
                                    </div>

                                    <div className="flex items-center gap-2">
                                        {(user.master || user.manager) && jogo.placar_casa === null ? (
                                            <input
                                                min="0"
                                                type="number"
                                                name="placar_casa"
                                                className="vb-input-jogos"
                                                onBlur={(e) => handleBlur(e, jogo)}
                                                onChange={(e) => handleChange(e, jogo)}
                                                disabled={loading || !gameStarted(jogo.inicio_timestamp)}
                                            ></input>
                                        ) : (
                                            <span className="vb-placar-number">{jogo.placar_casa}</span>
                                        )}

                                        <span>x</span>

                                        {(user.master || user.manager) && jogo.placar_fora === null ? (
                                            <input
                                                min="0"
                                                type="number"
                                                name="placar_fora"
                                                className="vb-input-jogos"
                                                onBlur={(e) => handleBlur(e, jogo)}
                                                onChange={(e) => handleChange(e, jogo)}
                                                disabled={loading || !gameStarted(jogo.inicio_timestamp)}
                                            ></input>
                                        ) : (
                                            <span className="vb-placar-number">{jogo.placar_fora}</span>
                                        )}
                                    </div>

                                    <div className="flex items-center gap-2">
                                        <img
                                            alt={jogo.timefora.nome}
                                            className="vb-escudo-time"
                                            src={jogo.timefora.escudo_url}
                                        />

                                        <span className="w-48 hidden sm:flex truncate">{jogo.timefora.nome}</span>
                                        <span className="vb-sigla-time">{jogo.timefora.sigla}</span>
                                    </div>
                                </div>

                                <div className="w-6">
                                    {(user.master || user.manager) && jogo.placar_fora !== null && (
                                        <button onClick={() => handleSave(jogo)}>{EditIcon}</button>
                                    )}
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            ) : (
                <div id="box-empty">Não existem dados para listar!</div>
            )}
        </div>
    );
};

export default Jogos;
