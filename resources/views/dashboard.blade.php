<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel principal - Clínica Dental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Mensaje de login --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            {{-- Tarjeta para ir al módulo de Tratamientos --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">
                        Tratamientos dentales
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Administra los tratamientos disponibles en la clínica
                        (solo roles <strong>admin</strong> o <strong>staff</strong>).
                    </p>

                    <a href="{{ route('tratamientos.index') }}"
                       class="inline-flex items-center px-5 py-3 
                              bg-yellow-300 hover:bg-yellow-400 
                              text-black font-semibold rounded-lg shadow-md 
                              border border-yellow-500 uppercase tracking-wide
                              focus:outline-none focus:ring-2 focus:ring-yellow-500 
                              focus:ring-offset-2 transition">
                        🦷 Ver tratamientos
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
