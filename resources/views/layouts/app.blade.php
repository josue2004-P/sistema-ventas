<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Sistema Base Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-500 to-cyan-400 text-white">

        <div class="flex min-h-screen">

            {{-- Sidebar como componente --}}
            <x-sidebar />

            {{-- Contenido principal --}}
            <div class="flex-1 flex flex-col">

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white/20 backdrop-blur-md shadow-md">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white font-semibold">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 p-6 bg-white/10 backdrop-blur-md rounded-xl mx-4 my-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
@push('scripts')
<script>
    document.querySelectorAll('.number-format').forEach(input => {
        // Mostrar con separadores al cargar
        input.value = Number(input.value).toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});

        // Formatear al escribir
        input.addEventListener('input', e => {
            let raw = e.target.value.replace(/,/g, '').replace(/\s/g, '');
            if (!isNaN(raw) && raw !== '') {
                e.target.value = Number(raw).toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
        });

        // Antes de enviar el form → limpiar formato
        input.form.addEventListener('submit', () => {
            let raw = input.value.replace(/,/g, '').replace(/\s/g, '');
            input.value = raw;
        });
    });
</script>
@endpush

