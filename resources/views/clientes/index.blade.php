<x-app-layout>
    <x-slot name="header">Clientes</x-slot>

    <div class="mb-4">
        <a href="{{ route('clientes.create') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded transition">Nuevo Cliente</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-white rounded-xl shadow-lg overflow-hidden">
            <thead class="bg-white/20">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre Completo</th>
                    <th class="px-4 py-2 text-left">Cuenta</th>
                    <th class="px-4 py-2 text-left">Activo</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr class="border-b border-white/20 hover:bg-white/10 transition">
                    <td class="px-4 py-2">{{ $cliente->id }}</td>
                    <td class="px-4 py-2">{{ $cliente->nombre }} {{ $cliente->apellidoPaterno }} {{ $cliente->apellidoMaterno }}</td>
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
