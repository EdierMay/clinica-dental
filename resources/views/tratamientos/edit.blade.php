<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar tratamiento') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- ERRORES DE VALIDACIÓN --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800 font-semibold">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('tratamientos.update', $tratamiento) }}">
                    @csrf
                    @method('PUT')

                    {{-- NOMBRE --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nombre
                        </label>
                        <input
                            type="text"
                            name="nombre"
                            value="{{ old('nombre', $tratamiento->nombre) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    {{-- DESCRIPCIÓN --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Descripción
                        </label>
                        <textarea
                            name="descripcion"
                            rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Opcional: describe el tratamiento, indicaciones, etc.">{{ old('descripcion', $tratamiento->descripcion ?? '') }}</textarea>
                    </div>

                    {{-- PRECIO --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Precio
                        </label>
                        <input
                            type="number"
                            step="0.01"
                            name="precio"
                            value="{{ old('precio', $tratamiento->precio) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    {{-- BOTONES --}}
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('tratamientos.index') }}"
                           class="inline-flex items-center px-4 py-2
                                  bg-gray-200 hover:bg-gray-300
                                  text-gray-800 text-sm font-semibold rounded-lg">
                            ✖ Cancelar
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5
                                   bg-yellow-400 hover:bg-yellow-500
                                   text-black text-sm font-extrabold rounded-xl shadow-lg
                                   border-2 border-black
                                   focus:outline-none focus:ring-2 focus:ring-yellow-500
                                   focus:ring-offset-2 transition">
                            💾 <span>Guardar</span>
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
