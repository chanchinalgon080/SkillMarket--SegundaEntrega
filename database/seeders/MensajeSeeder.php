<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensaje;
use App\Models\Usuario;

class MensajeSeeder extends Seeder
{
    public function run(): void
    {
        $emisor = Usuario::first();
        $receptor = Usuario::factory()->create();

        Mensaje::create([
            'emisor_id' => $emisor->id,
            'receptor_id' => $receptor->id,
            'contenido' => 'Hola, me interesa tu servicio'
        ]);
    }
}