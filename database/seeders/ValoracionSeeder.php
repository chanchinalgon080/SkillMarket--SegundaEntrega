<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Valoracion;
use App\Models\Usuario;
use App\Models\Servicio;

class ValoracionSeeder extends Seeder
{
    public function run(): void
    {
        $cliente = Usuario::first();
        $servicio = Servicio::first();

        Valoracion::create([
            'usuario_id' => $cliente->id,
            'servicio_id' => $servicio->id,
            'calificacion' => 5,
            'comentario' => 'Excelente servicio'
        ]);
    }
}