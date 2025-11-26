<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Usuarios del sistema') }}
       </h2>
   </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           {{-- ALERTAS --}}
           @if (session('status'))
               <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 font-semibold">
                   {{ session('status') }}
               </div>
           @endif

           @if (session('error'))
               <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800 font-semibold">
                   {{ session('error') }}
               </div>
           @endif

           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6">

                   {{-- ENCABEZADO + BOTÓN --}}
                   <div class="flex items-center justify-between mb-4">
                       <h3 class="text-lg font-semibold text-gray-800">
                           Listado de usuarios
                       </h3>

                       <a href="{{ route('users.create') }}"
                          class="inline-flex items-center px-4 py-2 bg-white border border-blue-600
                                 rounded-lg font-semibold text-sm text-blue-700 shadow-sm
                                 hover:bg-blue-50 focus:outline-none focus:ring-2
                                 focus:ring-blue-500 focus:ring-offset-2">
                           <span class="mr-2">👤</span> NUEVO USUARIO
                       </a>
                   </div>

                   {{-- TABLA --}}
                   <div class="overflow-x-auto">
                       <table class="min-w-full text-sm">
                           <thead class="bg-gray-100">
                               <tr>
                                   <th class="px-4 py-2 text-left">ID</th>
                                   <th class="px-4 py-2 text-left">Nombre</th>
                                   <th class="px-4 py-2 text-left">Email</th>
                                   <th class="px-4 py-2 text-left">Rol</th>
                                   <th class="px-4 py-2 text-left">Estado</th>
                                   <th class="px-4 py-2 text-right">Acciones</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($users as $user)
                                   <tr class="border-b">
                                       <td class="px-4 py-2">{{ $user->id }}</td>
                                       <td class="px-4 py-2 font-semibold text-gray-800">{{ $user->name }}</td>
                                       <td class="px-4 py-2 text-gray-700">{{ $user->email }}</td>
                                       <td class="px-4 py-2">
                                           <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold
                                                        bg-gray-100 text-gray-800">
                                               {{ ucfirst($user->role ?? 'Sin rol') }}
                                           </span>
                                       </td>
                                       <td class="px-4 py-2">
                                           @if ($user->active)
                                               <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold
                                                            bg-green-100 text-green-800">
                                                   Activo
                                               </span>
                                           @else
                                               <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold
                                                            bg-red-100 text-red-800">
                                                   Inactivo
                                               </span>
                                           @endif
                                       </td>
                                       <td class="px-4 py-2 text-right space-x-3">
                                           {{-- Editar --}}
                                           <a href="{{ route('users.edit', $user) }}"
                                              class="text-blue-700 font-semibold hover:underline">
                                               Editar
                                           </a>

                                           {{-- Activar / Desactivar --}}
                                           <form action="{{ route('users.toggleStatus', $user) }}"
                                                 method="POST"
                                                 class="inline">
                                               @csrf
                                               @method('PATCH')

                                               <button type="submit"
                                                       class="font-semibold hover:underline
                                                              {{ $user->active ? 'text-red-700' : 'text-green-700' }}"
                                                       onclick="return confirm('¿Quieres {{ $user->active ? 'desactivar' : 'activar' }} este usuario?')">
                                                   {{ $user->active ? 'Desactivar' : 'Activar' }}
                                               </button>
                                           </form>
                                       </td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td colspan="6" class="px-4 py-4 text-center text-gray-600">
                                           No hay usuarios registrados.
                                       </td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>
                   </div>

                   {{-- PAGINACIÓN (si la usas) --}}
                   @if (method_exists($users, 'links'))
                       <div class="mt-4">
                           {{ $users->links() }}
                       </div>
                   @endif
               </div>
           </div>
       </div>
   </div>
</x-app-layout>
