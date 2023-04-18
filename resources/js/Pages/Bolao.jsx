import React, { useState } from "react";
import toast from "react-hot-toast";
import { Inertia } from "@inertiajs/inertia";
import { EditIcon, FinishIcon, ParticipantsIcon, QuestionIcon } from "../helpers";

const Bolao = ({ bolaos, user }) => {
    const [modal, setModal] = useState(false);
    const [selected, setSelected] = useState(0);

    function openModal(id) {
        setSelected(id);
        setModal(true);
    }

    function handleFinish() {
        if (selected > 0) {
            Inertia.visit(`/finishBolao`, {
                method: "POST",
                data: { id: selected },
                preserveScroll: true,
                onFinish: () => {
                    setSelected(0);
                    setModal(false);
                    toast.success("Bolão finalizado com sucesso!");
                },
            });
        }
    }

    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            {bolaos.data.length > 0 ? (
                <div className="p-3 sm:p-6 bg-white border-b border-gray-200">
                    <div className="hidden md:flex md:flex-row border-b-2 pb-4 font-bold">
                        {user.master && <div className="flex items-start justify-end order-last mr-4">Ações</div>}

                        <div className="px-2 w-20">Ativo</div>
                        <div className="px-2 w-40">Nome</div>
                        <div className="px-2 w-40">Criador</div>
                        <div className="px-2 w-40">Data inicial</div>
                        <div className="px-2 w-40 flex-1">Descrição</div>
                    </div>

                    {bolaos.data.map((bolao, key) => (
                        <div key={key} className="flex flex-col md:flex-row border-b-2 last:border-none py-4">
                            {user.master && (
                                <div className="flex sm:flex-col items-start justify-end order-last gap-2">
                                    <a
                                        href={`/bolaos/${bolao.id}/edit`}
                                        className="btn-primary rounded-3xl p-[0.75rem] has-tooltip"
                                    >
                                        <span className="tooltip ml-[-68px]">Editar</span>
                                        {EditIcon}
                                    </a>
                                    <a
                                        href={`/bolaos/${bolao.id}/participantes`}
                                        className="btn-primary rounded-3xl p-[0.75rem] has-tooltip"
                                    >
                                        <span className="tooltip ml-[-114px]">Participantes</span>
                                        {ParticipantsIcon}
                                    </a>
                                    {bolao.ativo === 1 && (
                                        <button
                                            onClick={() => openModal(bolao.id)}
                                            className="btn-primary rounded-3xl p-[0.75rem] bg-red-700 hover:bg-red-800 focus:bg-red-800 has-tooltip"
                                        >
                                            <span className="tooltip ml-[-97px]">Finalizar</span>
                                            {FinishIcon}
                                        </button>
                                    )}
                                </div>
                            )}

                            <div className="p-2 w-20 flex items-start gap-1">
                                <span className="font-bold md:hidden">Ativo:</span>
                                <span className="md:px-[0.5rem] md:border-2 rounded-xl">
                                    {bolao.ativo ? "SIM" : "NÃO"}
                                </span>
                            </div>
                            <div className="p-2 md:w-40 truncate">
                                <span className="font-bold md:hidden">Nome:</span>
                                <span>{bolao.nome}</span>
                            </div>
                            <div className="p-2 md:w-40 truncate">
                                <span className="font-bold md:hidden">Criador:</span>
                                <span>{bolao.user_name}</span>
                            </div>
                            <div className="p-2 md:w-40 truncate">
                                <span className="font-bold md:hidden">Data inicial:</span>
                                <span>{bolao.inicio.split("-").reverse().join("/")}</span>
                            </div>
                            <div className="p-2 md:w-40 flex-1">
                                <span className="font-bold md:hidden">Descrição:</span>
                                <span className="font-light" dangerouslySetInnerHTML={{ __html: bolao.descricao }} />
                            </div>
                        </div>
                    ))}

                    {modal && (
                        <div className="fixed flex items-center justify-center top-0 left-0 overflow-x-hidden overflow-y-auto bg-black bg-opacity-60 w-screen h-screen z-40">
                            <div className="relative w-[90%] max-w-md max-h-full">
                                <div className="relative bg-white rounded-lg shadow">
                                    <div className="p-6 text-center text-gray-600">
                                        <div className="flex items-center justify-center">{QuestionIcon}</div>

                                        <h3 className="mb-8 mt-4 text-lg font-normal">
                                            Tem certeza que deseja finalizar este bolão?
                                        </h3>

                                        <div className="flex justify-center gap-4">
                                            <button
                                                type="button"
                                                className="btn-secondary"
                                                onClick={() => setModal(false)}
                                            >
                                                Cancelar
                                            </button>
                                            <button
                                                type="button"
                                                onClick={handleFinish}
                                                className="btn-primary bg-red-700 hover:bg-red-800 focus:bg-red-800"
                                            >
                                                Finalizar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            ) : (
                <div id="box-empty">Não existem dados para listar!</div>
            )}
        </div>
    );
};

export default Bolao;
