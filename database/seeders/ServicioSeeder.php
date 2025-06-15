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
        if (!$usuario) {
            $usuario = Usuario::factory()->create(); 
        }

        $categoriaDesarrolloWeb = Categoria::firstOrCreate(['name' => 'Desarrollo Web'], ['descripcion' => 'Servicios relacionados con el desarrollo de software y sitios web.']);
        $categoriaMarketing = Categoria::firstOrCreate(['name' => 'Marketing Digital'], ['descripcion' => 'Servicios de marketing online.']);
        $categoriaDiseño = Categoria::firstOrCreate(['name' => 'Diseño Gráfico'], ['descripcion' => 'Servicios de diseño visual y creatividad.']);

        $servicio = Servicio::create([
            'titulo' => 'Servicio de desarrollo web',
            'descripcion' => 'Desarrollo de páginas web responsivas y funcionales',
            'precio' => 500.00,
            'usuario_id' => $usuario->id, 
            'activo' => true, 
        ]);


        if ($categoriaDesarrolloWeb) {
            $servicio->categorias()->attach($categoriaDesarrolloWeb->id);
        }
        if ($categoriaMarketing) {
            $servicio->categorias()->attach($categoriaMarketing->id);
        }

        $servicio2 = Servicio::create([
            'titulo' => 'Campaña SEO avanzada',
            'descripcion' => 'Optimización de motores de búsqueda para posicionamiento web.',
            'precio' => 350.00,
            'usuario_id' => $usuario->id,
            'activo' => true,
        ]);
        if ($categoriaMarketing) {
            $servicio2->categorias()->attach($categoriaMarketing->id);
        }
        if ($categoriaDesarrolloWeb) { 
            $servicio2->categorias()->attach($categoriaDesarrolloWeb->id);
        }
    }
}
