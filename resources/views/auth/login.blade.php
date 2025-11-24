<x-guest-layout>
    <!-- Encabezado -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">
            Inicia sesión en tu cuenta
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Accede al panel de la clínica para gestionar tratamientos y usuarios.
        </p>
    </div>

    <!-- Errores de validación -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-validation-errors class="mb-4" />

    <!-- Formulario -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email"
                          type="email"
                          name="email"
                          class="block mt-1 w-full"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password"
                          type="password"
                          name="password"
                          class="block mt-1 w-full"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember + Recuperar -->
        <div class="flex items-center justify-between mt-4">
            <label class="inline-flex items-center text-sm text-gray-600">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                       name="remember">
                <span class="ml-2">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-800 underline"
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Botón -->
        <div class="mt-6">
            <x-primary-button
                class="w-full justify-center bg-black hover:bg-gray-900
                       text-white font-extrabold text-sm py-3
                       border-2 border-yellow-400 rounded-xl shadow-lg
                       focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                Entrar al panel
            </x-primary-button>
        </div>

        <!-- Registro -->
        @if (Route::has('register'))
            <p class="mt-4 text-center text-sm text-gray-600">
                ¿Aún no tienes cuenta?
                <a href="{{ route('register') }}"
                   class="font-semibold text-blue-600 hover:text-blue-800 underline">
                    Crear cuenta nueva
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
