<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Posts</title>
</head>
<body>
    
    <h1>Listado de Posts</h1>
    <a href="{{ route('posts.create') }}">Crear nuevo post</a>
    
    <ul>
        @isset($posts)
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <p>{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p> 

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        @else
            <li>No hay posts disponibles.</li>
        @endisset
    </ul>

</body>
</html>
