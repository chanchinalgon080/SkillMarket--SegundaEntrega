<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Tecnología', 'Educación', 'Salud', 'Finanzas', 'Legal', 'Psicología', 'Diseño gráfico',
            'Redacción', 'Traducción', 'Marketing digital', 'Soporte técnico', 'Desarrollo móvil',
            'Desarrollo web', 'Ingeniería', 'Música', 'Fotografía', 'Video', 'Animación',
            'Consultoría', 'Ventas', 'Gestión de proyectos', 'Arquitectura', 'Moda'
        ];

        foreach ($categorias as $nombre) {
            Categoria::firstOrCreate(['name' => $nombre]);
        }
    }
}
