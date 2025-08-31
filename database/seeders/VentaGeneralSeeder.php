<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VentaGeneral;

class VentaGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VentaGeneral::insert([
            [
                'cliente_id' => 1,
                'anio' => 2025,
                'mes' => 1,
                'ingresos_total' => 12000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 1,
                'anio' => 2025,
                'mes' => 2,
                'ingresos_total' => 13500.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 1,
                'anio' => 2025,
                'mes' => 3,
                'ingresos_total' => 15800.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 1,
                'anio' => 2025,
                'mes' => 4,
                'ingresos_total' => 14250.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cliente_id' => 1,
                'anio' => 2025,
                'mes' => 5,
                'ingresos_total' => 16300.25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
