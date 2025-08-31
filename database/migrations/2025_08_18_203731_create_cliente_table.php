<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            // Campos para persona física
            $table->string('nombre', 100)->nullable(); 
            $table->string('apellidoPaterno', 100)->nullable();
            $table->string('apellidoMaterno', 100)->nullable();

            // Campos para comercio
            $table->boolean('esNegocio')->default(false);
            $table->string('nombreComercio', 150)->nullable();

            $table->integer('cuenta')->unique(); 
            $table->foreignId('usuarioCreacionId')
                ->constrained('users') 
                ->onDelete('cascade');   

            $table->boolean('activo')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
