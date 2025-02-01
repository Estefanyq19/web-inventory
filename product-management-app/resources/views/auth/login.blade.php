@extends('layouts.app')<!--Plantilla base-->
@section('content')

<style>
/*imagen de fondo */
.bg-image {
    background: url('https://i.pinimg.com/1200x/5b/65/a9/5b65a951f8ec91380406f253159ff065.jpg') no-repeat center center fixed;
    background-size: cover;
}
/* Overlay oscuro */
.overlay {
    background: rgba(0, 0, 0, 0.5);
    }
</style>

<!-- Contenedor principal con la imagen de fondo -->
 <div class="bg-image w-full h-screen flex items-center justify-center relative">
    <div class="overlay absolute inset-0"></div>
    <!-- Formulario de login dentro de un contenedor blanco con opacidad -->
     <div class="relative bg-white bg-opacity-90 p-8 rounded-xl shadow-lg w-full max-w-sm">
        <h3 class="text-center text-gray-800 font-semibold text-2xl mb-4">{{ __('Iniciar sesión') }}</h3>
        
        <!-- Formulario que envía los datos a la ruta de login -->
         <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-medium">{{ __('Correo electrónico') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Campo de contraseña -->
             <div>
                <label for="password" class="block text-gray-700 font-medium">{{ __('Contraseña') }}</label>
                <input id="password" type="password" name="password" required 
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <!-- Mensaje de error si la contraseña es incorrecta -->
                 @error('password')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                 @enderror
                </div>
                <!-- Opción para recordar la sesión -->
                 <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" 
                    class="w-4 h-4 text-green-500 border-gray-300 rounded focus:ring-green-500">
                    <label for="remember" class="ml-2 text-gray-700">{{ __('Recordarme') }}</label>
                </div>
                <!-- Botón para enviar el formulario -->
                 <button type="submit" 
                 class="w-full bg-gradient-to-r from-green-500 to-green-700 text-white py-3 rounded-full font-semibold text-lg shadow-md transition-transform transform hover:scale-105">
                 {{ __('Iniciar sesión') }}
                </button>
                <!-- Enlace para la recuperación de contraseña -->
                 @if (Route::has('password.request'))
                 <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-gray-600 hover:text-green-500 transition">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
@endsection
