<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nombre
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Correo electrónico
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Rol --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Rol
                        </label>
                        <select name="role"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" @selected(old('role', $user->role) === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password (opcional) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nueva contraseña (opcional)
                        </label>
                        <input type="password" name="password"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">
                            Déjalo en blanco si no deseas cambiar la contraseña.
                        </p>
                    </div>

                    {{-- Confirmación password --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Confirmar nueva contraseña
                        </label>
                        <input type="password" name="password_confirmation"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    {{-- Activo --}}
                    <div class="mb-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="active" value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   @checked(old('active', $user->active))>
                            <span class="ml-2 text-sm text-gray-700">
                                Usuario activo
                            </span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('users.index') }}"
                           class="px-4 py-2 text-sm rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-yellow-300 hover:bg-yellow-400 
                                       text-black font-semibold rounded-lg shadow-md 
                                       border border-yellow-500 uppercase tracking-wide">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
