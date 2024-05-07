<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
</head>
<body>

    <h1>Editar Post</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Título: </label><br>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        
        <label for="subtitle">Subtitulo:</label><br>
        <input type="text" id="subtitle" name="subtitle" value="{{ $subtitle }}"><br><br>

        <label for="body">Contenido: </label><br>
        <textarea name="body" id="body" cols="100" rows="20">{{ $post->body }}</textarea><br><br>
        
        <button type="submit">Actualizar</button>
    </form>

    <form action="{{ route('posts.show', $post->id) }}" method="GET">
        @csrf
        <button type="submit">Cancelar</button>
    </form>

</body>
</html>
