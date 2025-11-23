<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tratamientos dentales') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Botón para crear nuevo tratamiento --}}
            <div class="mb-4 flex justify-end">
                <a href="{{ route('tratamientos.create') }}"
                   class="inline-flex items-center px-4 py-2 
                          bg-yellow-300 hover:bg-yellow-400 
                          text-black font-semibold rounded-lg shadow-md 
                          border border-yellow-500 uppercase tracking-wide
                          focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
                    ➕ Nuevo tratamiento
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Precio</th>
                            <th class="px-4 py-2 text-left">Creado</th>
                            <th class="px-4 py-2 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tratamientos as $tratamiento)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $tratamiento->id }}</td>
                                <td class="px-4 py-2">{{ $tratamiento->nombre }}</td>
                                <td class="px-4 py-2">${{ number_format($tratamiento->precio, 2) }}</td>
                                <td class="px-4 py-2">{{ $tratamiento->created_at?->format('d/m/Y') }}</td>
                                <td class="px-4 py-2 text-right space-x-2">
                                    <a href="{{ route('tratamientos.edit', $tratamiento) }}"
                                       class="inline-flex items-center px-3 py-1 text-xs font-semibold
                                              bg-blue-100 hover:bg-blue-200 text-blue-800 rounded-md transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('tratamientos.destroy', $tratamiento) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1 text-xs font-semibold
                                                       bg-red-100 hover:bg-red-200 text-red-700 rounded-md transition"
                                                onclick="return confirm('¿Eliminar tratamiento?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center">
                                    No hay tratamientos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $tratamientos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
