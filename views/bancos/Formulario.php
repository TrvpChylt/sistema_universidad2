<!DOCTYPE html>
<html lang="es" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bancos - Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.16.2/dist/full.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-base-200 min-h-screen font-sans">

    <div class="navbar bg-base-100 shadow-md px-6">
        <div class="flex-1">
            <a href="../index.php" class="btn btn-ghost normal-case text-xl text-primary font-bold">
                <i class="fa-solid fa-university mr-2"></i> Sistema UNETI
            </a>
        </div>
        <div class="flex-none">
            <span class="badge badge-primary p-3 font-semibold">Entidad: Bancos</span>
        </div>
    </div>

    <main class="container mx-auto p-6 mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h2 class="card-title text-secondary border-b pb-2 mb-4">
                        <i class="fa-solid fa-plus-circle"></i> Registrar Banco
                    </h2>
                    
                    <form action="BancoController.php" method="POST" class="space-y-4">
                        <input type="hidden" name="action" value="crear">

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Código del Banco</span>
                            </label>
                            <input type="text" name="numero_banco" placeholder="Ej: 0102" class="input input-bordered focus:input-primary w-full" required />
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Nombre de la Institución</span>
                            </label>
                            <input type="text" name="nombre_banco" placeholder="Ej: Banco de Venezuela" class="input input-bordered focus:input-primary w-full" required />
                        </div>

                        <div class="form-control pt-4">
                            <input type="hidden" name="action" value="crear">
                            <button type="submit" class="btn btn-primary w-full text-white">
                                <i class="fa-solid fa-save mr-2"></i> Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2 card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body">
                    <h2 class="card-title text-primary border-b pb-2 mb-4">
                        <i class="fa-solid fa-table"></i> Bancos Registrados
                    </h2>

                    <div class="overflow-x-auto w-full">
                        <table class="table w-full table-zebra">
                            <thead>
                                <tr>
                                    <th class="bg-base-300 text-base-content">ID</th>
                                    <th class="bg-base-300 text-base-content">Código</th>
                                    <th class="bg-base-300 text-base-content">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($bancos)): ?>
                                    <?php foreach ($bancos as $banco): ?>
                                        <tr>
                                            <th><?php echo htmlspecialchars($banco['id']); ?></th>
                                            <td>
                                                <span class="badge badge-ghost font-mono text-sm"><?php echo htmlspecialchars($banco['numero_banco']); ?></span>
                                            </td>
                                            <td class="font-semibold"><?php echo htmlspecialchars($banco['nombre_banco']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-8 text-base-content/50">
                                            <i class="fa-solid fa-folder-open text-4xl mb-2 block"></i>
                                            No hay bancos registrados en este momento.
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

</body>
</html>