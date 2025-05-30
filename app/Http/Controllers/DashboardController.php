<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Mensaje;
use App\Models\Disponibilidad;
use App\Models\Valoracion;
use App\Models\Contratacion;

class DashboardController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $servicios = Servicio::all();
        $usuarios = Usuario::all();
        $mensajes = Mensaje::all();
        $disponibilidades = Disponibilidad::all();
        $valoraciones = Valoracion::all();
        $contrataciones = Contratacion::all();

        return view('dashboard', compact(
            'categorias', 
            'servicios', 
            'usuarios', 
            'mensajes', 
            'disponibilidades', 
            'valoraciones', 
            'contrataciones'
        ));
    }
}
