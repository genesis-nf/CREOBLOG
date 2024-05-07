<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Post</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('posts.index') }}">Inicio</a></li>
        </ul>
    </nav>

    <h1>{{ $post->title }}</h1>

    @if($post->subtitle)
    <h2>{{ $post->subtitle }}</h2>
    @endif

    <p>{!! nl2br(e($post->body)) !!}</p>

    <form action="{{ route('posts.edit', $post->id) }}" method="GET">
        @csrf
        <button type="submit">Editar</button>
    </form>
    
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>

</body>
</html>
