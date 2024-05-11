@extends('layout')

@section('content')     
    <div class="navbar">
        <a href="{{ route('posts.create') }}">Crear nuevo post</a>
    </div>   
  
    <ul>
        @isset($posts)
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <p>{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p> 
                    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmarEliminacion({{ $post->id }})">Eliminar</button>
                    </form>
                </li>
            @endforeach
        @else
            <li>No hay posts disponibles.</li>
        @endisset
    </ul>
    @endsection
