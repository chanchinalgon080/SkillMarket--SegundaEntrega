<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disponibilidad;
use App\Models\Usuario;

class DisponibilidadSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = Usuario::first();

        Disponibilidad::create([
            'usuario_id' => $usuario->id,
            'fecha' => '2020-05-31',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '12:00:00'
        ]);
    }
}
