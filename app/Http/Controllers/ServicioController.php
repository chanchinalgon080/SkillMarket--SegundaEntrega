<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('categoria')->get();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('servicios.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'nullable|numeric|min:0',
            // no es necesario validar 'activo' como required, porque el checkbox puede no venir
        ]);

        $data = $request->only(['titulo', 'descripcion', 'categoria_id', 'precio']);
        $data['activo'] = $request->has('activo') ? true : false;
        $data['usuario_id'] = auth()->id();

        Servicio::create($data);

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        $categorias = Categoria::all();
        return view('servicios.edit', compact('servicio', 'categorias'));
    }

    public function update(Request $request, Servicio $servicio)
{
    $request->validate([
        'titulo' => 'required|string|max:100',
        'descripcion' => 'required|string',
        'categoria_id' => 'required|exists:categorias,id',
        'precio' => 'nullable|numeric|min:0',
        'activo' => 'required|boolean',
    ]);

    $servicio->titulo = $request->titulo;
    $servicio->descripcion = $request->descripcion;
    $servicio->categoria_id = $request->categoria_id;
    $servicio->precio = $request->precio;
    $servicio->activo = $request->has('activo') && $request->activo == 1 ? 1 : 0;
    $servicio->usuario_id = auth()->id();

    $servicio->save();

    return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
}


    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
