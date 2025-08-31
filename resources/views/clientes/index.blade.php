<x-app-layout>
    <x-slot name="header">Clientes</x-slot>

    {{-- Botón Nuevo Cliente y Buscador --}}
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
        <a href="{{ route('clientes.create') }}"
        class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded transition">
            Nuevo Cliente
        </a>

        <form method="GET" action="{{ route('clientes.index') }}" class="flex gap-2">
            <input type="text" name="nombre" value="{{ request('nombre') }}"
                placeholder="Buscar por nombre"
                class="px-3 py-2 rounded bg-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
            <button type="submit"
                    class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-500 transition">
                Buscar
            </button>
        </form>
    </div>

    {{-- Cards para móvil/tablet --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:hidden">
        @forelse($clientes as $cliente)
            <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 shadow-lg hover:bg-white/20 transition">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="font-semibold text-lg">{{ $cliente->nombre }}</h2>
                    <span class="text-sm {{ $cliente->activo ? 'text-green-400' : 'text-red-400' }}">
                        {{ $cliente->activo ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>
                <div class="text-sm text-white/70 mb-2">
                    <p><strong>ID:</strong> {{ $cliente->id }}</p>
                    <p><strong>Edad:</strong> {{ $cliente->edad }}</p>
                    <p><strong>Sexo:</strong> {{ $cliente->sexo }}</p>
                </div>
                <div class="flex gap-2 mt-2 flex-wrap">
                    <a href="{{ route('clientes.edit', $cliente) }}" 
                       class="text-cyan-200 hover:text-white transition font-medium">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" 
                                class="text-red-400 hover:text-red-600 transition font-medium">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-white/70 p-4">
                No hay clientes registrados.
            </div>
        @endforelse
    </div>

    {{-- Tabla para desktop/laptop --}}
    <div class="hidden lg:block overflow-x-auto rounded-xl shadow-lg bg-white/10">
        <table class="min-w-[700px] w-full text-white table-auto">
            <thead class="bg-white/20">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre Cliente / Nombre Negocio</th>
                    <th class="px-4 py-2 text-left">Cuenta</th>
                    <th class="px-4 py-2 text-left">Activo</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr class="border-b border-white/20 hover:bg-white/10 transition">
                    <td class="px-4 py-2">{{ $cliente->id }}</td>
                    <td class="px-4 py-2">
                        {{ $cliente->esNegocio
                            ? $cliente->nombreComercio 
                            : trim($cliente->nombre . ' ' . $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno) 
                        }}
                    </td>
                    <td class="px-4 py-2">{{ $cliente->cuenta }}</td>
                    <td class="px-4 py-2">{{ $cliente->activo ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('clientes.venta-general', $cliente) }}" class="text-cyan-200 hover:text-white transition">Venta General</a>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="text-cyan-200 hover:text-white transition">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿Eliminar?')" class="text-red-400 hover:text-red-600 transition">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
