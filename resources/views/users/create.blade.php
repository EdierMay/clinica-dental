<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Nombre</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-md"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Correo</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md"
                               required>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Contraseña</label>
                        <input type="password" name="password" class="w-full border-gray-300 rounded-md"
                               required>
                    </div>

                    {{-- Rol --}}
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Rol</label>
                        <select name="role" class="w-full border-gray-300 rounded-md" required>
                            <option value="admin">Administrador</option>
                            <option value="staff">Staff</option>
                            <option value="client">Cliente</option>
                        </select>
                    </div>

                    {{-- Activo --}}
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Estado</label>
                        <select name="active" class="w-full border-gray-300 rounded-md" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button
                            class="px-4 py-2 bg-yellow-300 hover:bg-yellow-400 
                                   text-black font-semibold rounded shadow">
                            Crear usuario
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>