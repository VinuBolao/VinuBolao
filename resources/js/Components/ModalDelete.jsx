import React from "react";
import { QuestionIcon } from "../helpers";

const ModalDelete = ({ onConfirm, onClose, message, btnLabel = "Excluir" }) => {
    return (
        <div className="fixed flex items-center justify-center top-0 left-0 overflow-x-hidden overflow-y-auto bg-black bg-opacity-60 w-screen h-screen z-40">
            <div className="relative w-[90%] max-w-md max-h-full">
                <div className="relative bg-white dark:bg-slate-800 rounded-lg shadow">
                    <div className="p-6 text-center text-gray-600">
                        <div className="flex items-center justify-center dark:text-slate-100">{QuestionIcon}</div>

                        <h3 className="mb-8 mt-4 text-lg font-normal dark:text-slate-100">{message}</h3>

                        <div className="flex justify-center gap-4">
                            <button type="button" className="btn-secondary min-w-[7rem]" onClick={onClose}>
                                Cancelar
                            </button>
                            <button
                                type="button"
                                onClick={onConfirm}
                                className="min-w-[7rem] btn-primary bg-red-700 hover:bg-red-800 focus:bg-red-800 dark:text-slate-300"
                            >
                                {btnLabel}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ModalDelete;
