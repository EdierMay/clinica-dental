<x-guest-layout>

    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg">

        {{-- Logo (opcional, si no lo tienes puedes quitarlo) --}}
        <div class="flex justify-center mb-4">
            <x-application-logo class="w-16 h-16" />
        </div>

        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-900">
                Crear cuenta en la Clínica
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Registra un nuevo usuario para acceder al sistema.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Nombre --}}
            <div>
                <x-input-label for="name" :value="__('Nombre completo')" />
                <x-text-input id="name"
                              class="block mt-1 w-full"
                              type="text"
                              name="name"
                              :value="old('name')"
                              required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email"
                              class="block mt-1 w-full"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password"
                              class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Confirmación --}}
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                <x-text-input id="password_confirmation"
                              class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Botón --}}
            <div class="mt-6">
                <button type="submit"
                    class="w-full justify-center bg-black hover:bg-gray-900
                           text-white font-extrabold text-sm py-3
                           border-2 border-yellow-400 rounded-xl shadow-lg
                           focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                    Registrarme
                </button>
            </div>

            {{-- Link a login --}}
            <p class="mt-4 text-center text-sm text-gray-600">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}"
                   class="font-semibold text-blue-600 hover:text-blue-800 underline">
                    Iniciar sesión
                </a>
            </p>
        </form>

    </div>

</x-guest-layout>