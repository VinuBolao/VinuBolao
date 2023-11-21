import React, { useState } from "react";

const Jogos = ({ bolao }) => {
    const [url, setUrl] = useState("");
    const [jogos, setJogos] = useState([]);
    const [rodada, setRodada] = useState(0);
    const [listNotFound, setListNotFound] = useState([]);

    const pesquisar = (e) => {
        e.preventDefault();

        axios
            .post("/api/getJogosGE", { url })
            .then((res) => {
                setJogos(res.data.jogos || []);
                setRodada(res.data.rodada || 0);
                setListNotFound(res.data.outros || []);
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const handleSave = () => {
        const data = jogos.map((jogo) => {
            let date = jogo?.horario.length > 15 ? `${jogo.horario}:00` : `${jogo?.horario.split(" ")[0]} 12:00:00`;

            return {
                rodada: rodada,
                bolao_id: bolao.bolao_id,
                inicio: date,
                timecasa_id: jogo.mandante.id,
                timefora_id: jogo.visitante.id,
                campeonato_id: bolao.campeonato_id,
            };
        });

        axios
            .post("/api/salvarJogos", { jogos: data })
            .then((res) => {
                setUrl("");
                setJogos([]);
                setRodada(0);
                setListNotFound([]);

                if (!res.data.error) toast.success(res.data.message);
            })
            .catch((err) => {
                console.log(err);
            });
    };

    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-600 dark:bg-slate-800 dark:text-slate-300">
            <div className="p-3 sm:p-6 border-gray-200">
                <form onSubmit={pesquisar} className="pb-8">
                    <label className="block mb-2">
                        <span className="">URL:</span>
                        <div className="flex">
                            <input
                                name="url"
                                type="text"
                                placeholder="Digite a url"
                                className="vb-custom-input mr-4"
                                value={url}
                                onChange={(e) => setUrl(e.target.value)}
                            />
                            <button type="submit" className="btn-primary">
                                Pesquisar
                            </button>
                        </div>
                    </label>
                    <span className="text-sm text-gray-500">
                        https://api.globoesporte.globo.com/tabela/4b20b911-f174-4958-9be8-4033dc74f970/fase/primeira-fase-paulista-2023/rodada/1/jogos
                        <br />
                        https://api.globoesporte.globo.com/tabela/d1a37fa4-e948-43a6-ba53-ab24ab3a45b1/fase/fase-unica-campeonato-brasileiro-2023/rodada/1/jogos
                    </span>
                </form>

                {listNotFound.length > 0 && (
                    <div className="flex flex-col">
                        <h3 className="font-bold">Times não encontrados:</h3>
                        {listNotFound.map((times, key) => (
                            <span key={key}>{times}</span>
                        ))}
                    </div>
                )}

                {jogos.length > 0 && (
                    <div>
                        <h2 className="text-xl mb-4 font-bold">
                            {bolao.nome} - Rodada {rodada}
                        </h2>
                        {jogos.map((item, key) => (
                            <div key={key} className="flex gap-1 mb-2 font-bold uppercase">
                                <span>{key + 1} - </span>
                                <span>{item.horario}</span>
                                <span>-</span>
                                <span>{item.mandante.nome}</span>
                                <span>x</span>
                                <span>{item.visitante.nome}</span>
                            </div>
                        ))}

                        <div className="py-4">
                            <button type="button" className="btn-primary" onClick={handleSave}>
                                Salvar Jogos
                            </button>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
};

export default Jogos;
