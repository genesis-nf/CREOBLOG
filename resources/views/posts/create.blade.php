@extends('layout')

@section('content')

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="title">Títuloo: </label><br>
        <input type="text" id="title" name="title"><br><br>
    
        <label for="subtitle">Subtítulo: </label><br>
        <input type="text" id="subtitle" name="subtitle"><br><br>

        <label for="image_data">Imagen:</label><br>
        <input type="file" id="image_data" name="image_data"><br><br>

        <label for="body">Contenido: </label><br>
        <textarea name="body" id="body" cols="100" rows="20"></textarea><br><br>
        
        <button type="submit">Publicar</button>
        <button type="button" onclick="confirmarCancelacion()">Cancelar</button>

    </form>
@endsection