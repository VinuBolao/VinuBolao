import React, { useState } from "react";
import toast from "react-hot-toast";
import { Inertia } from "@inertiajs/inertia";
import ModalDelete from "../Components/ModalDelete";

const Participantes = ({ bolao, user, users, participantes }) => {
    const [modal, setModal] = useState(false);
    const [selected, setSelected] = useState(null);

    const isCurrentBolao = bolao?.bolao_id === participantes[0]?.bolao_id;

    function openModal(id) {
        setSelected(participantes.find((p) => p.id === id));
        setModal(true);
    }

    function handleAdd() {
        const user_id = document.querySelector("[name=user_id]").value;

        if (user_id > 0) {
            const data = { bolao_id: bolao.bolao_id, user_id };

            Inertia.visit(`/participantes`, {
                method: "POST",
                data: data,
                preserveScroll: true,
                onFinish: () => {
                    toast.success("Participante adicionado com sucesso!");
                },
            });
        }
    }

    function handleDelete() {
        if (selected && selected.id > 0) {
            Inertia.visit(`/participantes/${selected.id}`, {
                method: "DELETE",
                preserveScroll: true,
            });
        }
    }

    return (
        <div className="bg-white dark:bg-slate-800 dark:text-slate-100 overflow-hidden shadow-sm sm:rounded-lg">
            {user.master && isCurrentBolao && (
                <div className="flex items-center justify-between p-3 sm:p-6 border-b border-gray-200 last:border-b-0 dark:border-slate-500 gap-4">
                    <select name="user_id" className="vb-custom-input italic">
                        <option value="">Selecione um usuário...</option>
                        {users.map((user, key) => (
                            <option key={key} value={user.id}>
                                {user.name}
                            </option>
                        ))}
                    </select>

                    <button className="btn-primary" onClick={handleAdd}>
                        Adicionar
                    </button>
                </div>
            )}

            {participantes.length > 0 ? (
                <div className="p-2">
                    {participantes.map((participante, key) => (
                        <div key={key} className="flex border-b-2 last:border-none py-2 text-sm dark:border-slate-500">
                            <div className="p-2">{participantes.length - key}</div>
                            <div className="p-2 flex-1 truncate">
                                <span>{participante.user.name}</span>
                            </div>
                            <div className="p-2 flex-1 truncate">
                                <span>{participante.created_format}</span>
                            </div>
                            <div className="flex items-center justify-center">
                                {isCurrentBolao && (
                                    <button
                                        onClick={() => openModal(participante.id)}
                                        className="btn-primary py-1 px-3 bg-red-700 hover:bg-red-800 focus:bg-red-800 dark:text-slate-300"
                                    >
                                        Excluir
                                    </button>
                                )}
                            </div>
                        </div>
                    ))}

                    {modal && (
                        <ModalDelete
                            onConfirm={handleDelete}
                            onClose={() => setModal(false)}
                            message={`Tem certeza que deseja excluir o ${selected.user.name}?`}
                        />
                    )}
                </div>
            ) : (
                <div id="box-empty">Não existem dados para listar!</div>
            )}
        </div>
    );
};

export default Participantes;
