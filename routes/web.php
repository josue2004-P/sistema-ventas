<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteVentaController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/contacto', 'contacto')->name('contacto');

Route::post('/contactar', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email',
        'mensaje' => 'required|string|max:1000',
    ]);
    return back()->with('success', 'Mensaje enviado correctamente.');
})->name('contactar');

Route::middleware(['auth'])->group(function () {
    Route::resource('permisos', PermisoController::class);
    Route::resource('perfiles', PerfilController::class)->parameters([
        'perfiles' => 'perfil'
    ]);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('clientes', ClienteController::class);

    Route::get('clientes/{cliente}/venta-general', [ClienteController::class, 'clienteVentaGeneral'])
     ->name('clientes.venta-general');
     Route::put('clientes/{id}/venta-general', [ClienteController::class, 'updateVentas'])->name('venta-general.update');
     
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
