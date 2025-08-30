<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white">Crear Usuario</h2>
    </x-slot>

    <div class="max-w-lg mx-auto mt-6 bg-white/20 backdrop-blur-md rounded-2xl shadow-lg p-6">

        <!-- Mostrar errores generales -->
        @if ($errors->any())
            <div class="mb-4 bg-red-500/30 text-red-700 p-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block font-medium text-white">Nombre</label>
                <input 
                    name="name" 
                    value="{{ old('name') }}" 
                    class="w-full rounded-lg bg-white/20 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-medium text-white">Email</label>
                <input 
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}" 
                    class="w-full rounded-lg bg-white/20 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label class="block font-medium text-white">Contraseña</label>
                <input 
                    name="password" 
                    type="password" 
                    class="w-full rounded-lg bg-white/20 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <label class="block font-medium text-white">Confirmar Contraseña</label>
                <input 
                    name="password_confirmation" 
                    type="password" 
                    class="w-full rounded-lg bg-white/20 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                >
            </div>

            <!-- Botones -->
            <div class="flex items-center space-x-4 mt-6">
                <button 
                    type="submit" 
                    class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold px-6 py-2 rounded-xl transition"
                >
                    Guardar
                </button>
                <a 
                    href="{{ route('usuarios.index') }}" 
                    class="text-white/70 hover:text-white hover:underline transition"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
