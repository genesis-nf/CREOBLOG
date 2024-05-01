<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Postst</title>
</head>
<body>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <label for="title">Títuloo: </label><br>
        <input type="text" id="title" name="title"><br><br>
    
        <label for="body">Contenido: </label><br>
        <textarea name="body" id="body" cols="100" rows="20"></textarea><br><br>
        
        <button type="submit">Publicar</button>
        <button type="button" onclick="cancelar()">Cancelar</button>

    </form>


    <script>
        function cancelar() {
            window.location.href = "{{ route('posts.index') }}";
        }
    </script>

</body>
</html>