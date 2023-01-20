import React from "react";
import { Toaster } from "react-hot-toast";
import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/inertia-react";

import "./bootstrap";

if (document.getElementById("app")) {
    createInertiaApp({
        resolve: (name) => import(`./Pages/${name}.jsx`),
        setup({ el, App, props }) {
            createRoot(el).render(
                <>
                    <App {...props}></App>
                    <Toaster
                        position="top-right"
                        gutter={3}
                        toastOptions={{
                            success: {
                                style: {
                                    color: "#fff",
                                    background: "#16a34a",
                                },
                                iconTheme: {
                                    primary: "#fff",
                                    secondary: "#16a34a",
                                },
                            },
                        }}
                    />
                </>
            );
        },
    });
}
