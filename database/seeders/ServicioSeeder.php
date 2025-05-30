<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Categoria;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = Usuario::first();
        $categoria = Categoria::first();

        Servicio::create([
            'titulo' => 'Servicio de desarrollo web',
            'descripcion' => 'Desarrollo de páginas web responsivas y funcionales',
            'precio' => 500.00,
            'usuario_id' => $usuario->id,
            'categoria_id' => $categoria->id
        ]);
    }
}
