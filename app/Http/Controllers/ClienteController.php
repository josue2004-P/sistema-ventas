<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar clientes
    public function index()
    {
        $query = \App\Models\Cliente::query();

        if ($nombre = request('nombre')) {
            $query->where('nombre', 'like', "%{$nombre}%");
        }

        $clientes = $query->get();

        return view('clientes.index', compact('clientes'));
    }

    // Formulario para crear cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre'          => 'required|string|max:100|unique:clientes,nombre',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'cuenta'          => 'required|integer|unique:clientes,cuenta',
            'activo'          => 'nullable|boolean',
        ]);

        Cliente::create([
            'nombre'            => $request->nombre,
            'apellidoPaterno'   => $request->apellidoPaterno,
            'apellidoMaterno'   => $request->apellidoMaterno,
            'cuenta'            => $request->cuenta,
            'usuarioCreacionId' => auth()->id(),
            'activo'            => $request->has('activo') ? $request->activo : true,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    // Mostrar cliente (opcional)
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    // Formulario para editar cliente
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Actualizar cliente
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'          => 'required|string|max:100|unique:clientes,nombre,' . $cliente->id,
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'cuenta'          => 'required|integer|unique:clientes,cuenta,' . $cliente->id,
            'activo'          => 'nullable|boolean',
        ]);

        $cliente->update([
            'nombre'            => $request->nombre,
            'apellidoPaterno'   => $request->apellidoPaterno,
            'apellidoMaterno'   => $request->apellidoMaterno,
            'cuenta'            => $request->cuenta,
            'activo'            => $request->has('activo') ? $request->activo : true,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    // Eliminar cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }

    // VISTA VENTA GENERAL
    public function clienteVentaGeneral($id)
    {
        $cliente = Cliente::with('ventasGenerales')->findOrFail($id);

        // Definir los años que queremos mostrar
        $anios = [2023, 2024, 2025];

        // Inicializar matriz [mes][anio] => ingresos_total
        $ventasPivot = [];
        for ($mes = 1; $mes <= 12; $mes++) {
            foreach ($anios as $anio) {
                $venta = $cliente->ventasGenerales
                    ->first(function($v) use ($anio, $mes) {
                        return $v->anio == $anio && $v->mes == $mes;
                    });
                $ventasPivot[$mes][$anio] = $venta ? $venta->ingresos_total : 0;
            }
        }

        return view('clientes.venta-general', compact('cliente', 'anios', 'ventasPivot'));
    }

    public function updateVentas(Request $request, $clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);

        $ventas = $request->input('ventas', []); // Array: ventas[anio][mes] => valor

        $data = [];
        foreach ($ventas as $anio => $meses) {
            foreach ($meses as $mes => $ingresos) {
                $data[] = [
                    'cliente_id' => $cliente->id,
                    'anio' => $anio,
                    'mes' => $mes,
                    'ingresos_total' => $ingresos,
                    'updated_at' => now(),
                    'created_at' => now(),
                ];
            }
        }

        // Upsert: inserta si no existe, actualiza si existe
        \App\Models\VentaGeneral::upsert(
            $data,
            ['cliente_id', 'anio', 'mes'], // columnas para detectar duplicados
            ['ingresos_total', 'updated_at'] // columnas a actualizar si ya existen
        );

        return redirect()->back()->with('success', 'Ventas actualizadas correctamente');
    }



}
