<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::with(['emisor', 'receptor'])->get();
        return view('mensajes.index', compact('mensajes'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('mensajes.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'emisor_id' => 'required|exists:users,id',
            'receptor_id' => 'required|exists:users,id|different:emisor_id',
            'contenido' => 'required|string|max:1000',
            'leido' => 'nullable|boolean', // usualmente inicia en false o 0
        ]);

        Mensaje::create([
            'emisor_id' => $request->emisor_id,
            'receptor_id' => $request->receptor_id,
            'contenido' => $request->contenido,
            'leido' => $request->leido ?? false,
        ]);

        return redirect()->route('mensajes.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function show(Mensaje $mensaje)
    {
        return view('mensajes.show', compact('mensaje'));
    }

    public function edit(Mensaje $mensaje)
    {
        $usuarios = User::all();
        return view('mensajes.edit', compact('mensaje', 'usuarios'));
    }

    public function update(Request $request, Mensaje $mensaje)
    {
        $request->validate([
            'emisor_id' => 'required|exists:users,id',
            'receptor_id' => 'required|exists:users,id|different:emisor_id',
            'contenido' => 'required|string|max:1000',
            'leido' => 'nullable|boolean',
        ]);

        $mensaje->update([
            'emisor_id' => $request->emisor_id,
            'receptor_id' => $request->receptor_id,
            'contenido' => $request->contenido,
            'leido' => $request->leido ?? $mensaje->leido,
        ]);

        return redirect()->route('mensajes.index')->with('success', 'Mensaje actualizado correctamente.');
    }

    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return redirect()->route('mensajes.index')->with('success', 'Mensaje eliminado correctamente.');
    }
}
