@extends('layouts.app')
@section('content')

<!-- Contenedor principal de la página con un máximo de 4XL de ancho, centrado y margen superior -->
 <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <!-- Botón de regresar -->
     <a href="{{ route('products.index') }}" class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
        ← Regresar
    </a>
    
    <!-- Título de la página para indicar que estamos creando un producto -->
     <h1 class="text-2xl font-bold mb-6 text-gray-700">Crear Producto</h1>
     <!-- Formulario de creación de producto -->
    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf <!-- Protección contra CSRF (Cross-Site Request Forgery) -->
        <!-- Campo para el nombre del producto -->
         <div>
            <label for="name" class="block text-gray-600 font-medium">Nombre del Producto</label>
            <input type="text" name="name" id="name" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Campo para la descripción del producto -->
         <div>
            <label for="description" class="block text-gray-600 font-medium">Descripción</label>
            <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <!-- Campo para el precio unitario del producto -->
         <div>
            <label for="unit_price" class="block text-gray-600 font-medium">Precio Unitario</label>
            <input type="number" name="unit_price" id="unit_price" required step="0.01" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Campo para la cantidad inicial del producto -->
         <div>
            <label for="initial_quantity" class="block text-gray-600 font-medium">Cantidad Inicial</label>
            <input type="number" name="initial_quantity" id="initial_quantity" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Botón para guardar el producto -->
         <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">Guardar Producto</button>
    </form>
</div>
@endsection
