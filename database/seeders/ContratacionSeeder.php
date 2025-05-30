<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contratacion;
use App\Models\Usuario;
use App\Models\Servicio;

class ContratacionSeeder extends Seeder
{
    public function run(): void
    {
        $cliente = Usuario::first();
        $servicio = Servicio::first();

        Contratacion::create([
            'cliente_id' => $cliente->id,
            'servicio_id' => $servicio->id,
            'fecha' => now(),
            'estado' => 'pendiente'
        ]);
    }
}
