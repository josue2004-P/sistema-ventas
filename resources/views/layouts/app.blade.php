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

    <div x-data="{ open: false }" class="flex h-screen">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Overlay móvil --}}
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-40 md:hidden"></div>

        {{-- Contenido principal --}}
        <div class="flex-1 md:ml-64 flex flex-col">

            {{-- Botón hamburger móvil --}}
            <div class="md:hidden p-4">
                <button @click="open = true" class="text-white text-2xl font-bold">&#9776;</button>
            </div>

            {{-- Page Heading --}}
            @isset($header)
                <header class="bg-white/20 backdrop-blur-md shadow-md">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white font-semibold">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Page Content --}}
            <main class="flex-1 p-6 bg-white/10 backdrop-blur-md rounded-xl mx-4 my-4">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
