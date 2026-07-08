<!DOCTYPE html>
<html lang="es" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bancos - Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: linear-gradient(135deg, #000C40 0%, #003973 50%, #E5E5BE 100%) !important; background-attachment: fixed !important;" 
      class="min-h-screen flex flex-col justify-between font-sans antialiased text-slate-100">

    <div class="navbar bg-[#000C40]/80 backdrop-blur-md sticky top-0 z-50 border-b border-[#E5E5BE]/20 px-6 md:px-24 lg:px-48 shadow-[0_10px_30px_rgba(0,12,64,0.5)] transition-all">
        <div class="flex-1">
            <a href="../../index.php" class="btn btn-ghost normal-case text-xl text-white font-black tracking-wider flex items-center gap-2 hover:bg-white/10">
                <i class="fa-solid fa-university text-white"></i> Sistema UNETI
            </a>
        </div>
        <div class="flex-none">
            <span class="text-xs md:text-sm opacity-90 font-bold bg-[#003973]/60 text-white px-4 py-2 rounded-full border border-[#E5E5BE]/30 shadow-md">
                Programador: Jesus Ramos
            </span>
        </div>
    </div>

    <main class="container mx-auto p-6 mt-6 flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="card bg-[#000C40]/90 backdrop-blur-lg rounded-3xl relative overflow-hidden border border-[#E5E5BE]/20 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.8),0_0_50px_rgba(0,57,115,0.3)] p-2">
                <div class="card-body">
                    <h2 class="card-title text-white font-black text-xl border-b border-[#E5E5BE]/20 pb-3 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-plus-circle text-white"></i> Registrar Banco
                    </h2>
                    
                    <form id="form-banco" class="space-y-5">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold !text-white">Código del Banco</span></label>
                            <input type="text" id="numero_banco" placeholder="Ej: 0102" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl placeholder:text-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold !text-white">Nombre de la Institución</span></label>
                            <input type="text" id="nombre_banco" placeholder="Ej: Banco de Venezuela" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl placeholder:text-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold !text-white">Tipo de Cuenta</span></label>
                            <input type="text" id="tipo_cuenta" placeholder="Ej: Cuenta Corriente" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl placeholder:text-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold !text-white">Titular de la cuenta</span></label>
                            <input type="text" id="titular" placeholder="Ej: Juan Pérez" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl placeholder:text-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control pt-4">
                            <button type="submit" class="btn border-0 bg-gradient-to-r from-[#E5E5BE] to-[#c7c79e] text-[#000C40] font-black rounded-2xl w-full transition-all duration-300">
                                <i class="fa-solid fa-save mr-1"></i> Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2 card bg-[#000C40]/90 backdrop-blur-lg rounded-3xl border border-[#E5E5BE]/20 p-2">
                <div class="card-body">
                    <h2 class="card-title text-white font-black text-xl border-b border-[#E5E5BE]/20 pb-3 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-table !text-white"></i> Bancos Registrados
                    </h2>

                    <div class="overflow-x-auto w-full rounded-2xl border border-[#E5E5BE]/10">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4">ID</th>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4">Código</th>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4">Nombre</th>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4">Tipo de Cuenta</th>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4">Titular de la Cuenta</th>
                                    <th class="bg-[#003973] !text-white font-extrabold py-4 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-bancos" class="divide-y divide-[#E5E5BE]/10"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <dialog id="modal_editar_banco" class="modal backdrop-blur-md">
        <div class="modal-box bg-[#000C40] border border-[#E5E5BE]/30 rounded-3xl text-slate-100 max-w-md shadow-2xl">
            <h3 class="font-black text-xl text-white border-b border-[#E5E5BE]/20 pb-3 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-[#E5E5BE]"></i> Modificar Registro
            </h3>
            
            <form id="form-editar-banco" class="space-y-4">
                <input type="hidden" id="edit_id" />

                <div class="form-control">
                    <label class="label"><span class="label-text font-bold !text-white">Código del Banco</span></label>
                    <input type="text" id="edit_numero_banco" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl font-semibold" required />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-bold !text-white">Nombre de la Institución</span></label>
                    <input type="text" id="edit_nombre_banco" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl font-semibold" required />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-bold !text-white">Tipo de Cuenta</span></label>
                    <input type="text" id="edit_tipo_cuenta" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl font-semibold" required />
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-bold !text-white">Titular de la cuenta</span></label>
                    <input type="text" id="edit_titular" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none !text-neutral-900 focus:text-neutral-900 w-full rounded-xl font-semibold" required />
                </div>

                <div class="modal-action pt-2 flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('modal_editar_banco').close()" class="btn btn-ghost text-slate-400 font-bold normal-case rounded-xl">Cancelar</button>
                    <button type="submit" class="btn border-0 bg-gradient-to-r from-[#E5E5BE] to-[#c7c79e] text-[#000C40] font-black rounded-xl px-6">Actualizar</button>
                </div>
            </form>
        </div>
    </dialog>

    <footer class="footer footer-center p-4 bg-[#000C40]/90 border-t border-[#E5E5BE]/10 text-slate-400 text-xs font-semibold">
        <div><p>© 2026 - Evaluación de la Sesión Didáctica 2</p></div>
    </footer>

    <script src="../../src/main.js"></script>
</body>
</html>