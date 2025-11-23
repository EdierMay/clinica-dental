<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tratamientos dentales') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERTAS SIMPLE (FALLBACK) --}}
            @if (session('success') || session('status'))
                <div class="mb-4 flex items-center gap-2 p-3 rounded-lg bg-green-100 text-green-800 font-semibold shadow">
                    <span>✅</span>
                    <span>{{ session('success') ?? session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 flex items-center gap-2 p-3 rounded-lg bg-red-100 text-red-800 font-semibold shadow">
                    <span>⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- BOTÓN: NUEVO TRATAMIENTO (MUY VISIBLE) --}}
            <div class="mb-4 flex justify-end">
                <a href="{{ route('tratamientos.create') }}"
                   class="inline-flex items-center gap-2 px-6 py-3
                          bg-yellow-400 hover:bg-yellow-500
                          text-black text-sm font-extrabold rounded-xl shadow-lg
                          border-2 border-black
                          uppercase tracking-wide
                          focus:outline-none focus:ring-2 focus:ring-yellow-500
                          focus:ring-offset-2 transition">
                    🆕
                    <span>Nuevo tratamiento</span>
                </a>
            </div>

            {{-- TABLA DE TRATAMIENTOS --}}
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
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-700">
                                    {{ $tratamiento->id }}
                                </td>

                                <td class="px-4 py-2 font-semibold text-gray-900">
                                    {{ $tratamiento->nombre }}
                                </td>

                                <td class="px-4 py-2 text-gray-800 font-medium">
                                    ${{ number_format($tratamiento->precio, 2) }}
                                </td>

                                <td class="px-4 py-2 text-gray-600">
                                    {{ $tratamiento->created_at?->format('d/m/Y') }}
                                </td>

                                <td class="px-4 py-2">
                                    <div class="flex justify-end gap-2">
                                        {{-- BOTÓN EDITAR --}}
                                        <a href="{{ route('tratamientos.edit', $tratamiento) }}"
                                           class="inline-flex items-center gap-1 px-4 py-2
                                                  bg-yellow-400 hover:bg-yellow-500
                                                  text-black text-xs font-semibold rounded-lg shadow
                                                  focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                            ✏️
                                            <span>Editar</span>
                                        </a>

                                        {{-- BOTÓN ELIMINAR (usa SweetAlert2 por la clase delete-form) --}}
                                        <form action="{{ route('tratamientos.destroy', $tratamiento) }}"
                                              method="POST"
                                              class="delete-form"
                                              data-message="¿Eliminar el tratamiento «{{ $tratamiento->nombre }}»?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-4 py-2
                                                           bg-red-600 hover:bg-red-700
                                                           text-white text-xs font-semibold rounded-lg shadow
                                                           focus:outline-none focus:ring-2 focus:ring-red-400">
                                                🗑️
                                                <span>Eliminar</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-600">
                                    No hay tratamientos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- PAGINACIÓN --}}
                <div class="p-4">
                    {{ $tratamientos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
