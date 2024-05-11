@extends('layout')

@section('content')    
    <nav>
        <ul>
            <li><a href="{{ route('posts.index') }}">Inicio</a></li>
        </ul>
    </nav>

    <h1>{{ $post->title }}</h1>

    @if($post->subtitle)
    <h2>{{ $post->subtitle }}</h2>
    @endif

    @if($post->image_data)
    <img src="{{ asset('storage/' . str_replace('public/', '', $post->image_data)) }}" alt="Imagen del post">
    @endif

    <p>{!! nl2br(e($post->body)) !!}</p>

    <form action="{{ route('posts.edit', $post->id) }}" method="GET">
        @csrf
        <button type="submit">Editar</button>
    </form>
    
    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" onclick="confirmarEliminacion({{ $post->id }})">Eliminar</button>
    </form>
@endsection
