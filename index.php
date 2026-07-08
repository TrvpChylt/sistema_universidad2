<!DOCTYPE html>
<html lang="es" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Universitaria - UNETI</title>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body style="background: linear-gradient(135deg, #000C40 0%, #003973 50%, #E5E5BE 100%) !important; background-attachment: fixed !important;" 
      class="min-h-screen flex flex-col justify-between font-sans antialiased text-slate-100">
    
    <!-- Navbar con sutil transparencia azulada -->
    <div class="navbar bg-[#000C40]/80 backdrop-blur-md sticky top-0 z-50 border-b border-[#E5E5BE]/20 px-6 md:px-24 lg:px-48 shadow-[0_10px_30px_rgba(0,12,64,0.5)] transition-all">
        <div class="flex-1">
            <span class="text-xl font-black text-white tracking-wider flex items-center gap-2">
                <span class="w-4 h-3 bg-white rounded-full animate-pulse shadow-[0_0_12px_#E5E5BE]"></span>
                UNETI
            </span>
        </div>
        <div class="flex-none text-xs md:text-sm opacity-90 font-semibold bg-[#003973]/60 text-white px-3 py-1.5 rounded-full border border-[#E5E5BE]/30 shadow-md">
            Programación II • Mod 1
        </div>
    </div>

    <!-- Contenido Principal (Agrandado y Proporcional) -->
    <main class="hero flex-grow py-16 px-4">
        <div class="hero-content text-center w-full">
            <!-- Card ampliada a max-w-xl con sombras profundas y mayor padding -->
            <div class="max-w-xl w-full bg-[#000C40]/90 backdrop-blur-lg p-10 md:p-14 rounded-3xl relative overflow-hidden group border border-[#E5E5BE]/20 shadow-[0_40px_70px_-15px_rgba(0,0,0,0.9),0_0_60px_rgba(0,57,115,0.4)] transition-all duration-300">
                
                <!-- Efecto de brillo de fondo usando el tono crema (Agrandado a w-48) -->
                <div class="absolute -top-12 -right-12 w-48 h-48 bg-[#E5E5BE]/10 rounded-full blur-3xl group-hover:bg-[#E5E5BE]/20 transition-all duration-500"></div>
                
                <!-- Avatar más grande y con anillo iluminado -->
                <div class="relative inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-35 h-35">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                    </svg>
                </div>

                <!-- Textos Principales Agrandados -->
                <div class="space-y-8 mb-8">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#003973] border border-[#E5E5BE]/40 text-white px-5 py-2 rounded-full text-sm font-bold uppercase tracking-wider mt-4 shadow-md">
                            Entidades Bancarias
                        </div>
                    </div>
                </div>

                <!-- Nombre del Programador -->
                <p class="text-base md:text-lg text-slate-300 font-medium tracking-wide mx-auto">
                    Programador: <span class="text-[#E5E5BE] font-bold">Jesus Ramos</span>
                </p>

                <!-- Línea de Separación Elegante en Degradado -->
                <div class="w-4/5 h-[1px] bg-white from-transparent via-[#E5E5BE]/30 to-transparent my-6 mx-auto shadow-sm"></div>

                <!-- Párrafo descriptivo -->
                <p class="text-base md:text-lg text-slate-300 mb-10 leading-relaxed mx-auto max-w-md">
                    Plataforma de administración interna estructurada bajo el patrón de arquitectura <span class="font-bold text-[#E5E5BE]">MVC</span>.
                </p>

                <!-- Línea de Separación Elegante en Degradado -->
                <div class="w-4/5 h-[1px] bg-white from-transparent via-[#E5E5BE]/30 to-transparent my-6 mx-auto shadow-sm"></div>

                <!-- Botón Cremoso más imponente -->
                <div class="flex justify-center">
                    <a href="controllers/BancoController.php" class="btn border-0 bg-gradient-to-r from-[#E5E5BE] to-[#c7c79e] hover:from-[#c7c79e] hover:to-[#E5E5BE] btn-block sm:btn-wide py-4 h-auto text-[#000C40] font-black text-lg tracking-wide rounded-2xl transition-all duration-300 normal-case group shadow-[0_20px_40px_rgba(229,229,190,0.25)] hover:shadow-[0_25px_50px_rgba(229,229,190,0.45)] hover:scale-[1.03]">
                        Acceder al Sistema
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1.5 stroke-[#000C40]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Integrado al fondo oscuro -->
    <footer class="footer footer-center p-4 bg-[#000C40]/90 border-t border-[#E5E5BE]/10 text-slate-400 text-xs font-semibold tracking-wide shadow-inner">
        <div>
            <p>© 2026 - Evaluación de la Sesión Didáctica 2</p>
        </div>
    </footer>

</body>
</html>