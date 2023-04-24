import React, { useState } from "react";
import toast from "react-hot-toast";
import { Inertia } from "@inertiajs/inertia";
import ModalDelete from "../Components/ModalDelete";

const Participantes = ({ bolao, user, users, participantes }) => {
    const [modal, setModal] = useState(false);
    const [selected, setSelected] = useState(0);

    function openModal(id) {
        setSelected(id);
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
        if (selected > 0) {
            Inertia.visit(`/participantes/${selected}`, {
                method: "DELETE",
                preserveScroll: true,
            });
        }
    }

    return (
        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            {user.master && (
                <div className="flex items-center justify-between p-3 sm:p-6 border-b border-gray-200 gap-4">
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
                <div className="p-3 sm:p-6 border-b border-gray-200">
                    <div className="hidden md:flex md:flex-row border-b-2 pb-2 font-bold">
                        <div className="flex items-start justify-end order-last mr-4">Ações</div>
                        <div className="px-2">#</div>
                        <div className="px-2 flex-1 truncate">Nome</div>
                        <div className="px-2 flex-1 truncate">Criação</div>
                    </div>

                    {participantes.map((participante, key) => (
                        <div key={key} className="flex flex-col md:flex-row border-b-2 last:border-none py-2">
                            <div className="flex items-start justify-end order-last">
                                <button
                                    onClick={() => openModal(participante.id)}
                                    className="btn-primary bg-red-700 hover:bg-red-800 focus:bg-red-800"
                                >
                                    Excluir
                                </button>
                            </div>
                            <div className="p-2">{key + 1}</div>
                            <div className="p-2 flex-1 truncate">
                                <span className="font-bold md:hidden">Nome:</span>
                                <span>{participante.user.name}</span>
                            </div>
                            <div className="p-2 flex-1 truncate">
                                <span className="font-bold md:hidden">Criação:</span>
                                <span>{participante.created_format}</span>
                            </div>
                        </div>
                    ))}

                    {modal && (
                        <ModalDelete
                            onConfirm={handleDelete}
                            onClose={() => setModal(false)}
                            message="Tem certeza que deseja excluir este participante?"
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
