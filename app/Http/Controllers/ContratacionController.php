<?php

namespace App\Http\Controllers;

use App\Models\Contratacion;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ContratacionController extends Controller
{
    public function index()
    {
        $contrataciones = Contratacion::with(['servicio', 'usuario'])->get();
        return view('contrataciones.index', compact('contrataciones'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        $usuarios = Usuario::all();
        return view('contrataciones.create', compact('servicios', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
        ]);

        Contratacion::create($request->all());

        return redirect()->route('contrataciones.index')->with('success', 'Contratación creada exitosamente.');
    }

    public function show(Contratacion $contratacion)
    {
        return view('contrataciones.show', compact('contratacion'));
    }

    public function edit(Contratacion $contratacion)
    {
        $servicios = Servicio::all();
        $usuarios = Usuario::all();
        return view('contrataciones.edit', compact('contratacion', 'servicios', 'usuarios'));
    }

    public function update(Request $request, Contratacion $contratacion)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
        ]);

        $contratacion->update($request->all());

        return redirect()->route('contrataciones.index')->with('success', 'Contratación actualizada exitosamente.');
    }

    public function destroy(Contratacion $contratacion)
    {
        $contratacion->delete();
        return redirect()->route('contrataciones.index')->with('success', 'Contratación eliminada exitosamente.');
    }
}
