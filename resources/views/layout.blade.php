<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Posts</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .index-header {
            text-align: center;
            font-size: 16px; 
        }

        .other-header {
            font-size: 10px;
        }
    </style>
     <script>
        function confirmarCancelacion() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Estás seguro de que deseas cancelar la edición del post?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cancelar!',
                cancelButtonText: 'No, volver atrás'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
        }

        function confirmarEliminacion(postId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Estás seguro de que deseas eliminar esta publicación?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        }

    </script>

</head>

<body>
<header class="{{ Request::is('posts') ? 'index-header' : 'other-header' }}">
        <h1>StoryScape</h1>
        @if(Request::is('posts'))
        <h4>Descubre, Inspira, Comparte: Tu plataforma para explorar el mundo a través de historias auténticas.</h4>
        @endif
    </header>

    <main>
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        @endif

        @yield('content')
    </main>
</body>
</html>
