<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::factory()->create([
            'name' => 'a',
            'email' => 'test@a.com',
        ]);

        $this->call([
            CategoriaSeeder::class,
            ServicioSeeder::class,
            DisponibilidadSeeder::class,
            ContratacionSeeder::class,
            ValoracionSeeder::class,
            MensajeSeeder::class,
        ]);
    }
}
