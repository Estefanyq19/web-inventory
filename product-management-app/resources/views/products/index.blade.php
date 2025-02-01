@extends('layouts.app')
@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Título de la página -->
     <h1 class="text-3xl font-bold text-gray-800 mb-6">Productos</h1>
     
     <!-- Mostrar Mensajes de Éxito o Error -->
      @if(session('success'))
      <!-- Mensaje de éxito (por ejemplo, producto añadido correctamente) -->
       <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
        {{ session('error') }}
    </div>
    @endif
    
    <!-- Formulario de Búsqueda y Filtros -->
     <form method="GET" action="{{ route('products.index') }}" class="bg-white p-6 rounded-lg shadow-md mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <input type="text" name="search" placeholder="Buscar por nombre" 
            value="{{ request('search') }}" 
            class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            <!-- Filtro de precio mínimo -->
             <input type="number" name="min_price" placeholder="Precio mínimo" 
             value="{{ request('min_price') }}" 
             class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
             <!-- Filtro de precio máximo -->
              <input type="number" name="max_price" placeholder="Precio máximo" 
              value="{{ request('max_price') }}" 
              class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
              <!-- Filtro de cantidad mínima -->
               <input type="number" name="min_quantity" placeholder="Cantidad mínima" 
               value="{{ request('min_quantity') }}" 
               class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
               <!-- Filtro de cantidad máxima -->
                <input type="number" name="max_quantity" placeholder="Cantidad máxima" 
                value="{{ request('max_quantity') }}" 
                class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <!-- Botón para aplicar filtros de búsqueda -->
                 <button type="submit" 
                 class="bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                 Buscar
                </button>
            </div>
        </form>
        
        <!-- Enlace para crear un nuevo producto -->
         <a href="{{ route('products.create') }}" 
         class="bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition inline-block mb-4">
         Crear Producto
        </a>
        
        <!-- Tabla de Productos -->
         <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Descripción</th>
                        <th class="p-4">Precio</th>
                        <th class="p-4">Cantidad Inicial</th>
                        <th class="p-4">Cantidad Actual</th>
                        <th class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-4">{{ $product->name }}</td>
                        <td class="p-4">{{ $product->description }}</td>
                        <td class="p-4">${{ number_format($product->unit_price, 2) }}</td>
                        <td class="p-4">{{ $product->initial_quantity }}</td>
                        <td class="p-4">{{ $product->current_quantity }}</td>
                        <td class="p-4 flex gap-2">
                            <!-- Botones de acción: Ver, Editar, Eliminar -->
                             <a href="{{ route('products.show', $product) }}" 
                             class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600 transition">
                             Ver
                            </a>
                            <a href="{{ route('products.edit', $product) }}" 
                            class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 transition">
                            Editar
                            </a>
                            <!-- Formulario de eliminación de producto -->
                             <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginación -->
         <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
    
    <!-- Script de SweetAlert2 para confirmar eliminación -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
     // Función para mostrar la alerta de confirmación
     document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form'); // Encuentra el formulario
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡Esta acción no se puede deshacer!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Envía el formulario para eliminar el producto
                    }
                });
            });
            });
    </script>
    
@endsection
