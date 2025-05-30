<?php

namespace App\Http\Controllers;

use App\Models\Valoracion;
use App\Models\User;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    public function index()
    {
        $valoraciones = Valoracion::with(['cliente', 'servicio'])->get();
        return view('valoraciones.index', compact('valoraciones'));
    }

    public function create()
    {
        $clientes = User::all();
        $servicios = Servicio::all();
        return view('valoraciones.create', compact('clientes', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:users,id',
            'servicio_id' => 'required|exists:servicios,id',
            'calificacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:1000',
        ]);

        Valoracion::create($request->all());

        return redirect()->route('valoraciones.index')->with('success', 'Valoración registrada correctamente.');
    }

    public function show(Valoracion $valoracion)
    {
        return view('valoraciones.show', compact('valoracion'));
    }

    public function edit(Valoracion $valoracion)
    {
        $clientes = User::all();
        $servicios = Servicio::all();
        return view('valoraciones.edit', compact('valoracion', 'clientes', 'servicios'));
    }

    public function update(Request $request, Valoracion $valoracion)
    {
        $request->validate([
            'cliente_id' => 'required|exists:users,id',
            'servicio_id' => 'required|exists:servicios,id',
            'calificacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:1000',
        ]);

        $valoracion->update($request->all());

        return redirect()->route('valoraciones.index')->with('success', 'Valoración actualizada correctamente.');
    }

    public function destroy(Valoracion $valoracion)
    {
        $valoracion->delete();
        return redirect()->route('valoraciones.index')->with('success', 'Valoración eliminada correctamente.');
    }
}
