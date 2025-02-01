<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <!-- Enlace a Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Barra de navegación -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold">Gestión de Productos</div>
            @if(Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Cerrar sesión</button>
            </form>
            @endif
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
        @yield('content') <!-- Aquí se inyectará el contenido específico de cada vista -->
    </div>

</body>
</html>
