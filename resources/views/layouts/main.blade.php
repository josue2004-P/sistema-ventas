<!DOCTYPE html>
<html lang="es" x-data="{ open: false }" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-gray-50 via-white to-gray-100 font-sans antialiased">
        <!-- Navbar con gradiente y glass -->
        <nav class="h-16 fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-blue-700/90 via-cyan-600/90 to-blue-800/90 backdrop-blur-md shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-white">
                <!-- Logo -->
                <a href="/" class="text-2xl font-bold tracking-wide hover:text-cyan-200 transition">
                    <span class="text-cyan-300">Sistema</span> Gestión
                </a>

                <!-- Links en desktop -->
                <div class="space-x-8 hidden md:flex font-medium items-center">
                    <a href="#servicios" class="hover:text-cyan-300 transition">Servicios</a>
                    <a href="#contacto" class="hover:text-cyan-300 transition">Contacto</a>
                    <a href="/login" class="bg-white text-blue-700 px-5 py-2 rounded-xl font-semibold shadow hover:bg-gray-100 transition">
                        Ingresar
                    </a>
                </div>

                <!-- Menú móvil -->
                <div class="md:hidden" x-data="{ open: false }">
                    <button @click="open = !open" class="focus:outline-none">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Dropdown móvil -->
                    <div 
                        x-show="open" 
                        x-transition 
                        class="absolute top-16 left-0 w-full bg-gradient-to-r from-blue-700 via-cyan-600 to-blue-800 text-white flex flex-col items-center space-y-6 py-8 shadow-lg font-medium">
                        <a href="#servicios" class="hover:text-cyan-300 transition">Servicios</a>
                        <a href="#contacto" class="hover:text-cyan-300 transition">Contacto</a>
                        <a href="/login" class="bg-white text-blue-700 px-5 py-2 rounded-xl font-semibold shadow hover:bg-gray-100 transition">
                            Ingresar
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Contenido -->
        <main class="">
            @yield('content')
        </main>
        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-10">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Acerca de</h3>
                <p>Plataforma diseñada para optimizar la gestión de clientes y ventas en negocios de cualquier tamaño.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Enlaces Rápidos</h3>
                <ul class="space-y-2">
                <li><a href="#servicios" class="hover:text-white">Servicios</a></li>
                <li><a href="#planes" class="hover:text-white">Planes</a></li>
                <li><a href="#faq" class="hover:text-white">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contacto</h3>
                <p>Email: soporte@clientesventas.com</p>
                <p>Tel: +52 55 1234 5678</p>
            </div>
            </div>
            <div class="text-center text-gray-500 mt-8">
            © {{ date('Y') }} Gestión de Clientes y Ventas. Todos los derechos reservados.
            </div>
        </footer>

    </body>
</html>

