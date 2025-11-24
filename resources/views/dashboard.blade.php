<x-app-layout>

    {{-- TÍTULO SUPERIOR --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel principal - Clínica Dental') }}
        </h2>
    </x-slot>

    {{-- CONTENIDO --}}
    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- SECCIÓN BIENVENIDA --}}
            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900">BIENVENIDO</h3>
                <p class="text-xl mt-1 font-extrabold text-green-700"> A tu clínica!</p>
                <p class="text-gray-600 mt-1">De Confianza.</p>
            </div>

            {{-- ============================= --}}
            {{--     MÓDULO DE TRATAMIENTOS     --}}
            {{-- ============================= --}}
            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <p class="text-sm text-blue-700 font-semibold mb-2">Módulo clínico</p>

                <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    🦷 Tratamientos dentales
                </h3>

                <p class="text-gray-600 mt-1">
                    Administra los tratamientos disponibles en la clínica.
                    <span class="font-bold">Solo roles admin o staff.</span>
                </p>

                {{-- BOTÓN BLANCO VISIBLE --}}
                <div class="mt-4">
                    <a href="{{ route('tratamientos.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3
                              bg-white hover:bg-gray-100
                              text-black text-sm font-bold rounded-xl shadow-lg
                              border-2 border-yellow-400
                              focus:outline-none focus:ring-2 focus:ring-yellow-500
                              focus:ring-offset-2 transition">
                        🦷
                        <span>VER TRATAMIENTOS</span>
                    </a>
                </div>

            </div>

            {{-- ============================= --}}
            {{--     MÓDULO DE USUARIOS         --}}
            {{-- ============================= --}}
            @if(auth()->user()->role === 'admin')
            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <p class="text-sm text-blue-700 font-semibold mb-2">Módulo administrativo</p>

                <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    👥 Usuarios del sistema
                </h3>

                <p class="text-gray-600 mt-1">
                    Gestiona los usuarios registrados: roles, estado activo/inactivo y acceso al sistema.
                </p>

                {{-- BOTÓN BLANCO FUNCIONAL --}}
                <div class="mt-4">
                    <a href="{{ route('users.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3
                              bg-white hover:bg-gray-100
                              text-black text-sm font-bold rounded-xl shadow-lg
                              border-2 border-blue-400
                              focus:outline-none focus:ring-2 focus:ring-blue-500
                              focus:ring-offset-2 transition">
                        👤
                        <span>VER USUARIOS</span>
                    </a>
                </div>

            </div>
            @endif

        </div>
    </div>

</x-app-layout>
