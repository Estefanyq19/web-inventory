<x-guest-layout>
    <div class="w-full h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
            <h3 class="text-center text-gray-800 font-semibold text-2xl mb-4">{{ __('¿Olvidaste tu contraseña?') }}</h3>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('No hay problema. Déjanos saber tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña, lo que te permitirá elegir una nueva.') }}
            </div>

            <!-- Mensaje de estado de sesión -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulario de recuperación de contraseña -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Campo de dirección de correo electrónico -->
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Botón de enviar enlace para restablecer contraseña -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="w-full py-3 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-lg shadow-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500">
                        {{ __('Enviar enlace para restablecer la contraseña') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
