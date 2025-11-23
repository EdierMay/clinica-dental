<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo tratamiento') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('tratamientos.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">
                            Nombre
                        </label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('nombre')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">
                            Descripción
                        </label>
                        <textarea name="descripcion" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">
                            Precio
                        </label>
                        <input type="number" name="precio" step="0.01" min="0"
                               value="{{ old('precio') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('precio')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('tratamientos.index') }}"
                           class="px-4 py-2 border rounded">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
