import React from "react";
import { CloseIcon } from "../helpers";

const ModalPalpites = ({ jogo, list, handleClose }) => {
    const checkPalpite = (placar_casa, placar_fora, palpite) => {
        let classesRetorno = "w-[30%] text-center rounded-md";
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
                classesRetorno += " bg-green-100 dark:bg-green-400 dark:text-slate-800";
            } else if (winnerCasa || winnerFora || isTied) {
                classesRetorno += " bg-yellow-50 dark:bg-yellow-500 dark:text-slate-800";
            }
        }

        return classesRetorno;
    };

    return (
        <div className="absolute grid place-content-center inset-0 w-full h-screen bg-[#000000bf] z-[100]">
            <div className="w-[90vw] sm:w-[600px] bg-white dark:bg-slate-800 shadow-md rounded-t-xl rounded-b-lg text-gray-600 dark:text-slate-300">
                <h1 className="flex justify-between font-bold text-xl text-center bg-slate-800 dark:bg-slate-900 text-white p-4 rounded-t-lg">
                    <span className=""></span>
                    <span className="flex items-center justify-center">
                        {`${jogo?.timecasa?.nome || ""} vs ${jogo?.timefora?.nome || ""}`}
                    </span>
                    <span className="">
                        <button
                            onClick={() => handleClose(null)}
                            className="p-2 bg-gray-100 rounded-[50%] text-slate-800"
                        >
                            {CloseIcon}
                        </button>
                    </span>
                </h1>

                <ul className="h-[80vh] divide-y overflow-y-auto py-2 px-4">
                    {list.map((item, key) => (
                        <li key={key} className="flex justify-between p-2 font-bold border-gray-700">
                            <div className="w-[10%]">{key + 1}</div>
                            <div className="w-[60%]">{item.user.name}</div>
                            <div className={checkPalpite(jogo.placar_casa, jogo.placar_fora, item)}>
                                {item.palpite_casa} x {item.palpite_fora}
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    );
};

export default ModalPalpites;
