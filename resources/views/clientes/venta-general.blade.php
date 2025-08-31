<x-app-layout>
    <x-slot name="header">Ventas Generales de {{ $cliente->nombre }}</x-slot>

    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('clientes.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded transition">Volver</a>
        <button form="ventas-form" type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded transition">Guardar Cambios</button>
    </div>

    <div class="overflow-x-auto">
        <form id="ventas-form" action="{{ route('venta-general.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full text-white rounded-xl shadow-lg overflow-hidden">
                <thead class="bg-white/20">
                    <tr>
                        <th class="px-4 py-2">Mes / Año</th>
                        @foreach($anios as $anio)
                            <th class="px-4 py-2">{{ $anio }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $meses = [
                            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                        ];
                    @endphp
                    @foreach(range(1,12) as $mes)
                    <tr class="border-b border-white/20 hover:bg-white/10 transition">
                        <td class="px-4 py-2">{{ $meses[$mes] }}</td>
                        @foreach($anios as $anio)
                            @php
                                $value = $ventasPivot[$mes][$anio] ?? 0;
                            @endphp
<td class="px-2 py-1">
    <div class="flex items-center">
        <span class="mr-1">$</span>
        <input type="text" 
               name="ventas[{{ $anio }}][{{ $mes }}]" 
               value="{{ number_format($value, 2, '.', ',') }}"
               class="w-full text-right rounded-lg bg-white/20 text-white px-2 py-1">
    </div>
</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</x-app-layout>
