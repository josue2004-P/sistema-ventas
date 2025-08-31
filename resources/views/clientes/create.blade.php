<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white">Crear Cliente</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white/20 backdrop-blur-md rounded-2xl shadow-lg p-6">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <!-- Es Negocio -->
            <div class="mb-4">
                <label class="inline-flex items-center text-white font-medium">
                    <input type="checkbox" id="esNegocio" name="esNegocio" value="1" 
                        class="form-checkbox  bg-white/20 placeholder-gray-200  h-5 w-5 text-cyan-500 rounded">
                    <span class="ml-2">Es negocio</span>
                </label>
            </div>

            <!-- Campos Persona Física -->
            <div id="personaFisicaCampos">
                <div class="mb-4">
                    <label class="block font-medium text-white">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" 
                           class="w-full rounded-lg bg-white/20 text-white placeholder-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                           placeholder="Ingrese el nombre">
                    @error('nombre')
                        <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-white">Apellido Paterno</label>
                    <input type="text" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" 
                           class="w-full rounded-lg bg-white/20 text-white placeholder-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                           placeholder="Ingrese el apellido paterno">
                    @error('apellidoPaterno')
                        <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-white">Apellido Materno</label>
                    <input type="text" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" 
                           class="w-full rounded-lg bg-white/20 text-white placeholder-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                           placeholder="Ingrese el apellido materno">
                    @error('apellidoMaterno')
                        <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Campo Comercio -->
            <div id="comercioCampo" class="mb-4 hidden">
                <label class="block font-medium text-white">Nombre del Comercio</label>
                <input type="text" name="nombreComercio" value="{{ old('nombreComercio') }}" 
                       class="w-full rounded-lg bg-white/20 text-white placeholder-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                       placeholder="Ingrese el nombre del comercio">
                @error('nombreComercio')
                    <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cuenta -->
            <div class="mb-4">
                <label class="block font-medium text-white">Cuenta</label>
                <input type="number" name="cuenta" value="{{ old('cuenta') }}" 
                       class="w-full rounded-lg bg-white/20 text-white placeholder-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300" 
                       placeholder="Número de cuenta" >
                @error('cuenta')
                    <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Usuario Creación -->
            <input type="hidden" name="usuarioCreacionId" value="{{ auth()->id() }}">

            <!-- Activo -->
            <div class="mb-4">
                <label class="inline-flex items-center text-white font-medium">
                    <input type="checkbox" name="activo" value="1" class="  bg-white/20 placeholder-gray-200 form-checkbox rounded h-5 w-5 text-cyan-500" checked>
                    <span class="ml-2">Activo</span>
                </label>
                @error('activo')
                    <p class="text-red-200 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold px-6 py-2 rounded-xl transition">Guardar</button>
                <a href="{{ route('clientes.index') }}" class="text-white/70 hover:text-white hover:underline transition">Cancelar</a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        const esNegocioCheckbox = document.getElementById('esNegocio');
        const personaFisicaCampos = document.getElementById('personaFisicaCampos');
        const comercioCampo = document.getElementById('comercioCampo');

        function toggleCampos() {
            if (esNegocioCheckbox.checked) {
                personaFisicaCampos.classList.add('hidden');
                comercioCampo.classList.remove('hidden');
            } else {
                personaFisicaCampos.classList.remove('hidden');
                comercioCampo.classList.add('hidden');
            }
        }

        // Inicializar al cargar
        toggleCampos();

        // Escuchar cambios
        esNegocioCheckbox.addEventListener('change', toggleCampos);
    </script>
    @endpush

</x-app-layout>
