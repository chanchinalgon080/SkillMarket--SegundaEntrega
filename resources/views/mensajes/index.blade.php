@extends('layouts.app')

@section('title', 'Mensajes')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-6">Mensajes</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($mensajes->count())
        <ul class="space-y-4">
            @foreach($mensajes as $mensaje)
                <li class="p-4 bg-white shadow-md rounded-lg">
                    <p class="text-sm text-gray-600">
                        <strong>De:</strong> {{ $mensaje->emisor->name ?? 'N/A' }}
                        <strong class="ml-4">Para:</strong> {{ $mensaje->receptor->name ?? 'N/A' }}
                    </p>
                    <p class="mt-2 text-gray-800">{{ $mensaje->contenido }}</p>
                    <p class="mt-2 text-sm text-gray-500 italic">
                        {{ $mensaje->leido ? 'Leído' : 'No leído' }}
                    </p>
                    <a href="{{ route('mensajes.show', $mensaje->id) }}" class="inline-block mt-2 text-blue-600 hover:underline">
                        Ver mensaje
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No hay mensajes.</p>
    @endif

    <div class="mt-6">
        <a href="{{ route('mensajes.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Enviar mensaje
        </a>
    </div>
</div>
@endsection
