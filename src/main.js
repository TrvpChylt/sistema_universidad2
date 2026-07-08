document.addEventListener("DOMContentLoaded", () => {
    const formBanco = document.getElementById("form-banco");
    const formEditarBanco = document.getElementById("form-editar-banco");
    const tablaBancos = document.getElementById("tabla-bancos");
    const modalEditar = document.getElementById("modal_editar_banco");
    
    const URL_CONTROLADOR = "../../controllers/BancoController.php";

    // 1. FUNCIÓN PARA LISTAR LOS BANCOS (GET)
    const listarBancos = async () => {
        try {
            const respuesta = await fetch(URL_CONTROLADOR);
            if (!respuesta.ok) throw new Error("Error en la respuesta del servidor");
            
            const bancos = await respuesta.json();
            tablaBancos.innerHTML = "";

            if (bancos.length === 0) {
                tablaBancos.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <i class="fa-solid fa-folder-open text-5xl text-[#003973] mb-3 block"></i>
                            <span class="font-semibold block">No hay bancos registrados en este momento.</span>
                        </td>
                    </tr>
                `;
                return;
            }

            bancos.forEach(banco => {
                const fila = document.createElement("tr");
                fila.className = "hover:bg-[#003973]/30 transition-colors duration-200";
                fila.innerHTML = `
                    <th class="text-slate-400 font-bold py-4">${banco.id}</th>
                    <td class="py-4">
                        <span class="badge bg-[#003973] border border-[#E5E5BE]/30 text-[#E5E5BE] font-mono text-xs px-2.5 py-1.5 rounded-md font-bold shadow-sm">
                            ${banco.numero_banco}
                        </span>
                    </td>
                    <td class="font-bold text-slate-200 py-4">${banco.nombre_banco}</td>
                    <td class="font-semibold text-slate-300 py-4">${banco.tipo_cuenta}</td>
                    <td class="font-semibold text-slate-300 py-4">${banco.titular}</td>
                    <td class="py-4 text-center space-x-2">
                        <button class="btn btn-xs bg-cyan-600 hover:bg-cyan-500 text-white border-0 rounded-md btn-editar" 
                                data-id="${banco.id}" 
                                data-codigo="${banco.numero_banco}" 
                                data-nombre="${banco.nombre_banco}" 
                                data-tipo="${banco.tipo_cuenta}" 
                                data-titular="${banco.titular}">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        <button class="btn btn-xs bg-red-600 hover:bg-red-500 text-white border-0 rounded-md btn-eliminar" 
                                data-id="${banco.id}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                `;
                tablaBancos.appendChild(fila);
            });

            asignarEventosBotones();
        } catch (error) {
            console.error("Error al listar bancos:", error);
        }
    };

    // 2. ENLAZAR CLICKS DE EDICIÓN Y ELIMINACIÓN
    const asignarEventosBotones = () => {
        // Manejo de eliminación física
        document.querySelectorAll(".btn-eliminar").forEach(boton => {
            boton.addEventListener("click", async () => {
                const id = boton.getAttribute("data-id");
                if (confirm("¿Estás seguro de que deseas eliminar este registro bancario?")) {
                    try {
                        const respuesta = await fetch(URL_CONTROLADOR, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ action: "eliminar", id })
                        });
                        const res = await respuesta.json();
                        if (res.status === "success") {
                            listarBancos();
                        } else {
                            alert(res.message);
                        }
                    } catch (e) {
                        console.error("Error al eliminar:", e);
                    }
                }
            });
        });

        // Manejo de la Edición (Cargar datos en el Modal Flotante)
        document.querySelectorAll(".btn-editar").forEach(boton => {
            boton.addEventListener("click", () => {
                document.getElementById("edit_id").value = boton.getAttribute("data-id");
                document.getElementById("edit_numero_banco").value = boton.getAttribute("data-codigo");
                document.getElementById("edit_nombre_banco").value = boton.getAttribute("data-nombre");
                document.getElementById("edit_tipo_cuenta").value = boton.getAttribute("data-tipo");
                document.getElementById("edit_titular").value = boton.getAttribute("data-titular");

                // Mostrar modal usando el método oficial de DaisyUI/HTML5
                modalEditar.showModal();
            });
        });
    };

    // 3. EVENTO SUBMIT DEL FORMULARIO PRINCIPAL (CREAR)
    if (formBanco) {
        formBanco.addEventListener("submit", async (e) => {
            e.preventDefault();

            const datosEnvio = {
                action: "crear",
                numero_banco: document.getElementById("numero_banco").value.trim(),
                nombre_banco: document.getElementById("nombre_banco").value.trim(),
                tipo_cuenta: document.getElementById("tipo_cuenta").value.trim(),
                titular: document.getElementById("titular").value.trim()
            };

            try {
                const respuesta = await fetch(URL_CONTROLADOR, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(datosEnvio)
                });

                if (!respuesta.ok) throw new Error("Error de comunicación");
                const resultado = await respuesta.json();

                if (resultado.status === "success") {
                    alert("🎉 " + resultado.message);
                    formBanco.reset();
                    listarBancos();
                } else {
                    alert("❌ Error: " + resultado.message);
                }
            } catch (error) {
                console.error(error);
                alert("❌ Ocurrió un error al procesar el registro.");
            }
        });
    }

    // 4. EVENTO SUBMIT DEL FORMULARIO DEL MODAL (ACTUALIZAR)
    if (formEditarBanco) {
        formEditarBanco.addEventListener("submit", async (e) => {
            e.preventDefault();

            const datosEnvio = {
                action: "actualizar",
                id: document.getElementById("edit_id").value,
                numero_banco: document.getElementById("edit_numero_banco").value.trim(),
                nombre_banco: document.getElementById("edit_nombre_banco").value.trim(),
                tipo_cuenta: document.getElementById("edit_tipo_cuenta").value.trim(),
                titular: document.getElementById("edit_titular").value.trim()
            };

            try {
                const respuesta = await fetch(URL_CONTROLADOR, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(datosEnvio)
                });

                if (!respuesta.ok) throw new Error("Error de comunicación");
                const resultado = await respuesta.json();

                if (resultado.status === "success") {
                    alert("🎉 " + resultado.message);
                    modalEditar.close(); // Cerrar ventana emergente
                    listarBancos();     // Recargar asíncronamente
                } else {
                    alert("❌ Error: " + resultado.message);
                }
            } catch (error) {
                console.error(error);
                alert("❌ Ocurrió un error al intentar actualizar.");
            }
        });
    }

    // Carga inicial al entrar
    listarBancos();
});