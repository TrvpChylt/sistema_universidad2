<!DOCTYPE html>
<html lang="es" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Universitaria - UNETI</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-base-200/50 flex flex-col justify-between font-sans antialiased">

    <div class="navbar bg-base-100/80 backdrop-blur-md sticky top-0 z-50 border-b border-base-300 px-6 md:px-24 lg:px-48 shadow-sm transition-all">
        <div class="flex-1">
            <span class="text-xl font-black text-primary tracking-wider flex items-center gap-2">
                <span class="w-3 h-3 bg-primary rounded-full animate-pulse"></span>
                UNETI
            </span>
        </div>
        <div class="flex-none text-xs md:text-sm opacity-70 font-semibold bg-base-200 px-3 py-1.5 rounded-full border border-base-300">
            Programación II • Mod 1
        </div>
    </div>

    <main class="hero flex-grow py-12 px-4">
        <div class="hero-content text-center">
            <div class="max-w-md w-full bg-base-100 p-8 md:p-10 rounded-3xl shadow-xl border border-base-400/60 relative overflow-hidden group">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-all duration-500"></div>
                
                <div class="mb-6 relative inline-block">
                    <div class="avatar online">
                        <div class="w-30 h-30 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img/>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    <div>
                        <h1 class="text-3xl font-black tracking-tight text-base-content">
                            Programador
                        </h1>
                        
                    </div>
                    
                    <div>
                        <h1 class="text-3xl font-black tracking-tight text-base-content mt-1">
                            Sistema de Gestión
                        </h1>
                        <div class="inline-flex items-center gap-1.5 bg-secondary/10 border border-secondary/20 text-secondary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                            </svg>
                            Entidades Bancarias
                        </div>
                    </div>
                </div>

                <p class="text-sm md:text-base text-base-content/70 mb-8 leading-relaxed">
                    Plataforma de administración interna estructurada bajo el patrón de arquitectura <span class="font-bold text-base-content">MVC</span>.
                </p>

                <div class="flex justify-center">
                    <a href="controllers/BancoController.php" class="btn btn-primary btn-block sm:btn-wide shadow-md shadow-primary/20 hover:shadow-lg hover:shadow-primary/30 text-white font-bold tracking-wide rounded-2xl transition-all duration-300 normal-case group">
                        Acceder al Sistema
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer footer-center p-4 bg-base-100 border-t border-base-300 text-base-content text-xs font-semibold tracking-wide shadow-inner">
        <div>
            <p>© 2026 - Evaluación de la Sesión Didáctica 2</p>
        </div>
    </footer>

</body>
</html>