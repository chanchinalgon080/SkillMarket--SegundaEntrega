<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Categoria; 
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
        $query = Servicio::with('categorias'); 

        $query->search($request->input('search')); 
        $query->globalSearch($request->input('global_search')); 

        $servicios = $query->get(); 

        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('servicios.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'nullable|numeric|min:0',
            'activo' => 'boolean',
            'categorias_ids' => 'required|array',
            'categorias_ids.*' => 'exists:categorias,id',
        ]);

        $data = $request->only(['titulo', 'descripcion', 'precio']);
        $data['activo'] = $request->has('activo') ? true : false;
        $data['usuario_id'] = auth()->id();

        $servicio = Servicio::create($data);

        $servicio->categorias()->sync($request->input('categorias_ids'));

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show(Servicio $servicio)
    {
        $servicio->load('categorias');
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        $servicio->load('categorias');
        $categorias = Categoria::all();
        return view('servicios.edit', compact('servicio', 'categorias'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio' => 'nullable|numeric|min:0',
            'activo' => 'boolean',
            'categorias_ids' => 'required|array',
            'categorias_ids.*' => 'exists:categorias,id',
        ]);

        $data = $request->only(['titulo', 'descripcion', 'precio']);
        $data['activo'] = $request->has('activo') ? true : false;

        $servicio->update($data);

        $servicio->categorias()->sync($request->input('categorias_ids'));

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
