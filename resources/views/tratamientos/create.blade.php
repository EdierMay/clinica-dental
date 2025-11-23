<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear tratamiento') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- ERRORES DE VALIDACIÓN --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800 font-semibold">
                        ⚠️ Por favor corrige los errores del formulario.
                    </div>
                @endif

                <form method="POST" action="{{ route('tratamientos.store') }}">
                    @csrf

                    {{-- NOMBRE --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nombre">
                            Nombre
                        </label>
                        <input id="nombre" name="nombre" type="text"
                               value="{{ old('nombre') }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm
                                      focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                    {{-- DESCRIPCIÓN (solo visual, opcional) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="descripcion">
                            Descripción
                        </label>
                        <textarea id="descripcion" name="descripcion" rows="3"
                                  class="block w-full rounded-lg border-gray-300 shadow-sm
                                         focus:border-indigo-500 focus:ring-indigo-500"
                                  placeholder="Ejemplo: Se utiliza para mejorar la apariencia estética de los dientes...">{{ old('descripcion') }}</textarea>
                    </div>

                    {{-- PRECIO --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="precio">
                            Precio
                        </label>
                        <input id="precio" name="precio" type="number" step="0.01" min="0"
                               value="{{ old('precio') }}"
                               class="block w-full rounded-lg border-gray-300 shadow-sm
                                      focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                    {{-- BOTONES --}}
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('tratamientos.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5
                                  bg-gray-200 hover:bg-gray-300
                                  text-gray-800 font-semibold rounded-lg shadow
                                  focus:outline-none focus:ring-2 focus:ring-gray-400">
                            ✖ Cancelar
                        </a>

                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5
                                       bg-black hover:bg-gray-900
                                       text-white font-bold rounded-lg shadow-lg
                                       border-2 border-yellow-400
                                       focus:outline-none focus:ring-2 focus:ring-yellow-500
                                       focus:ring-offset-2">
                            💾 Guardar tratamiento
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
