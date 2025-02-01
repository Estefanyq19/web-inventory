@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Botón para regresar -->
     <a href="{{ route('products.index') }}" 
     class="bg-gray-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-gray-700 transition inline-block mb-6">
     &larr; Regresar a la lista
    </a>

    <!-- Título de la sección de detalles del producto -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalles del Producto</h1>
    <!-- Tarjeta de Detalles -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <!-- Nombre del producto -->
        <h3 class="text-xl font-semibold text-gray-700">{{ $product->name }}</h3>
        <!-- Descripción del producto -->
        <p class="mt-3 text-gray-600"><strong>Descripción:</strong> {{ $product->description }}</p>
         <!-- Precio unitario del producto, formateado como moneda -->
        <p class="text-gray-600"><strong>Precio Unitario:</strong> ${{ number_format($product->unit_price, 2) }}</p>
        <!-- Cantidad inicial en inventario -->
        <p class="text-gray-600"><strong>Cantidad Inicial:</strong> {{ $product->initial_quantity }}</p>
        <!-- Cantidad actual en inventario -->
        <p class="text-gray-600"><strong>Cantidad Actual:</strong> {{ $product->current_quantity }}</p>
    </div>

    <!-- Título de la sección para registrar un movimiento en el inventario -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Registrar Movimiento de Inventario</h2>

    <!-- Formulario de Movimiento -->
    <form action="{{ route('products.updateInventory', $product) }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-semibold">Cantidad</label>
            <input type="number" name="quantity" id="quantity" required 
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Selección del tipo de movimiento (entrada o salida) -->
        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold">Tipo de Movimiento</label>
            <select name="type" id="type" required 
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
            </select>
        </div>

        !-- Botón para enviar el formulario y registrar el movimiento -->
        <button type="submit" 
            class="bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition">
            Registrar Movimiento
        </button>
    </form>
</div>
@endsection
