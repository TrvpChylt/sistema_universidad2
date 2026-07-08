<!DOCTYPE html>
<html lang="es" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bancos - Universidad</title>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: linear-gradient(135deg, #000C40 0%, #003973 50%, #E5E5BE 100%) !important; background-attachment: fixed !important;" 
      class="min-h-screen flex flex-col justify-between font-sans antialiased text-slate-100">

    <!-- Navbar con sutil transparencia azulada -->
    <div class="navbar bg-[#000C40]/80 backdrop-blur-md sticky top-0 z-50 border-b border-[#E5E5BE]/20 px-6 md:px-24 lg:px-48 shadow-[0_10px_30px_rgba(0,12,64,0.5)] transition-all">
        <div class="flex-1">
            <a href="../index.php" class="btn btn-ghost normal-case text-xl text-white font-black tracking-wider flex items-center gap-2 hover:bg-white/10">
                <i class="fa-solid fa-university text-[#E5E5BE]"></i> Sistema UNETI
            </a>
        </div>
        <div class="flex-none">
            <span class="text-xs md:text-sm opacity-90 font-bold bg-[#003973]/60 text-[#E5E5BE] px-4 py-2 rounded-full border border-[#E5E5BE]/30 shadow-md">
                Entidad: Bancos
            </span>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="container mx-auto p-6 mt-6 flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Columna 1: Formulario de Registro -->
            <div class="card bg-[#000C40]/90 backdrop-blur-lg rounded-3xl relative overflow-hidden border border-[#E5E5BE]/20 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.8),0_0_50px_rgba(0,57,115,0.3)] p-2">
                <div class="card-body">
                    <h2 class="card-title text-white font-black text-xl border-b border-[#E5E5BE]/20 pb-3 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-plus-circle text-white"></i> Registrar Banco
                    </h2>
                    
                    <form action="BancoController.php" method="POST" class="space-y-5">
                        <input type="hidden" name="action" value="crear">

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-bold !text-white">Código del Banco</span>
                            </label>
                            <input type="text" name="numero_banco" placeholder="Ej: 0102" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none text-white w-full rounded-xl placeholder-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-bold !text-white">Nombre de la Institución</span>
                            </label>
                            <input type="text" name="nombre_banco" placeholder="Ej: Banco de Venezuela" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none text-white w-full rounded-xl placeholder-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-bold !text-white">Tipo de Cuenta</span>
                            </label>
                            <input type="text" name="tipo_cuenta" placeholder="Ej: Cuenta Corriente" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none text-white w-full rounded-xl placeholder-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-bold !text-white">Titular de la cuenta</span>
                            </label>
                            <input type="text" name="titular_cuenta" placeholder="Ej: Juan Pérez" class="input input-bordered bg-[#003973]/40 border-[#E5E5BE]/30 focus:border-[#E5E5BE] focus:outline-none text-white w-full rounded-xl placeholder-slate-500 font-semibold" required />
                        </div>

                        <div class="form-control pt-4">
                            <button type="submit" class="btn border-0 bg-gradient-to-r from-[#E5E5BE] to-[#c7c79e] hover:from-[#c7c79e] hover:to-[#E5E5BE] text-[#000C40] font-black text-md tracking-wide rounded-2xl transition-all duration-300 normal-case w-full shadow-[0_15px_35px_rgba(229,229,190,0.2)] hover:shadow-[0_20px_40px_rgba(229,229,190,0.4)] hover:scale-[1.02]">
                                <i class="fa-solid fa-save mr-1"></i> Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Columna 2: Tabla de Registros (Ocupa 2 columnas en pantallas grandes) -->
            <div class="lg:col-span-2 card bg-[#000C40]/90 backdrop-blur-lg rounded-3xl relative overflow-hidden border border-[#E5E5BE]/20 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.8),0_0_50px_rgba(0,57,115,0.3)] p-2">
                <div class="card-body">
                    <h2 class="card-title text-white font-black text-xl border-b border-[#E5E5BE]/20 pb-3 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-table text-[#E5E5BE]"></i> Bancos Registrados
                    </h2>

                    <div class="overflow-x-auto w-full rounded-2xl border border-[#E5E5BE]/10 shadow-inner">
                        <table class="table w-full">
                            <!-- Encabezado de la Tabla -->
                            <thead>
                                <tr>
                                    <th class="bg-[#003973] text-[#E5E5BE] font-extrabold text-sm border-b border-[#E5E5BE]/10 py-4">ID</th>
                                    <th class="bg-[#003973] text-[#E5E5BE] font-extrabold text-sm border-b border-[#E5E5BE]/10 py-4">Código</th>
                                    <th class="bg-[#003973] text-[#E5E5BE] font-extrabold text-sm border-b border-[#E5E5BE]/10 py-4">Nombre</th>
                                    <th class="bg-[#003973] text-[#E5E5BE] font-extrabold text-sm border-b border-[#E5E5BE]/10 py-4">Tipo de Cuenta</th>
                                    <th class="bg-[#003973] text-[#E5E5BE] font-extrabold text-sm border-b border-[#E5E5BE]/10 py-4">Titular de la Cuenta</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la Tabla -->
                            <tbody class="divide-y divide-[#E5E5BE]/10">
                                <?php if (!empty($bancos)): ?>
                                    <?php foreach ($bancos as $banco): ?>
                                        <tr class="hover:bg-[#003973]/30 transition-colors duration-200">
                                            <th class="text-slate-400 font-bold py-4"><?php echo htmlspecialchars($banco['id']); ?></th>
                                            <td class="py-4">
                                                <span class="badge bg-[#003973] border border-[#E5E5BE]/30 text-[#E5E5BE] font-mono text-xs px-2.5 py-1.5 rounded-md font-bold shadow-sm">
                                                    <?php echo htmlspecialchars($banco['numero_banco']); ?>
                                                </span>
                                            </td>
                                            <td class="font-bold text-slate-200 py-4"><?php echo htmlspecialchars($banco['nombre_banco']); ?></td>
                                            <td class="font-semibold text-slate-300 py-4"><?php echo htmlspecialchars($banco['tipo_cuenta']); ?></td>
                                            <td class="font-semibold text-slate-300 py-4"><?php echo htmlspecialchars($banco['titular']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-12 text-slate-400">
                                            <i class="fa-solid fa-folder-open text-5xl text-[#003973] mb-3 block animate-bounce"></i>
                                            <span class="font-semibold block">No hay bancos registrados en este momento.</span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer Integrado al fondo oscuro -->
    <footer class="footer footer-center p-4 bg-[#000C40]/90 border-t border-[#E5E5BE]/10 text-slate-400 text-xs font-semibold tracking-wide shadow-inner mt-8">
        <div>
            <p>© 2026 - Evaluación de la Sesión Didáctica 2</p>
        </div>
    </footer>

</body>
</html>