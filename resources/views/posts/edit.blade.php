
@extends('layout')
@section('content')

    <h1>Editar Post</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Título: </label><br>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        
        <label for="subtitle">Subtitulo:</label><br>
        <input type="text" id="subtitle" name="subtitle" value="{{ $post->subtitle }}"><br><br>
        
        <label for="body">Contenido: </label><br>
        <textarea name="body" id="body" cols="100" rows="20">{{ $post->body }}</textarea><br><br>
        
        <button type="submit">Actualizar</button>
    </form>

        <button type="submit" onclick="confirmarCancelacion()">Cancelar</button>
@endsection

