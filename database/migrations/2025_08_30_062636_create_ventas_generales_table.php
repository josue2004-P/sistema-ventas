<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas_generales', function (Blueprint $table) {
            $table->id();
            
            // Relación con clientes (customer_id -> clientes.id)
            $table->foreignId('cliente_id')
                  ->constrained('clientes')
                  ->onDelete('cascade');

            $table->year('anio');
            $table->tinyInteger('mes');

            $table->decimal('ingresos_total', 12, 2)->default(0.00);

            $table->timestamps();

            // Índice único para (anio, mes, cliente_id)
            $table->unique(['cliente_id', 'anio', 'mes']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas_generales');
    }
};
