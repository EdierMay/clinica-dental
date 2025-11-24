{{-- resources/views/home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bienvenido(a) a Clínica Dental Sonrisa Segura
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-500 via-emerald-400 to-gray-100 dark:from-blue-900 dark:via-emerald-700 dark:to-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 dark:bg-gray-900/90 overflow-hidden shadow-xl sm:rounded-2xl p-8">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    {{-- Columna de texto --}}
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            Clínica Dental Sonrisa Segura
                        </h1>
                        <p class="text-lg text-emerald-600 dark:text-emerald-300 font-semibold mb-4">
                            “Cuidamos tu sonrisa, mejoramos tu salud”
                        </p>

                        <p class="text-gray-700 dark:text-gray-200 mb-4">
                            Bienvenido(a) al sistema de gestión de <b>Clínica Dental Sonrisa Segura</b>.
                            Desde aquí podrás administrar citas, pacientes y tratamientos de forma rápida y segura.
                        </p>

                        <ul class="space-y-2 text-gray-700 dark:text-gray-200 mb-6">
                            <li>• Agenda y consulta tus citas dentales.</li>
                            <li>• Revisa el historial de tratamientos de cada paciente.</li>
                            <li>• Accede al panel de control con estadísticas de la clínica.</li>
                        </ul>

                        <div class="flex flex-wrap gap-3">
                            <a
                                href="{{ route('dashboard') }}"
                                class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-emerald-500 text-white font-semibold shadow-lg hover:shadow-xl transition"
                            >
                                Ir al Dashboard
                            </a>

                            <a
                                href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-6 py-3 rounded-xl border border-emerald-400 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-50/60 dark:hover:bg-gray-800 transition"
                            >
                                Editar mi perfil
                            </a>
                        </div>
                    </div>

                    {{-- Columna “imagen” / tarjeta decorativa --}}
                    <div class="bg-gradient-to-br from-blue-500 via-emerald-400 to-gray-100 dark:from-blue-800 dark:via-emerald-600 dark:to-gray-800 rounded-3xl p-6 shadow-lg flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2">
                                Información rápida
                            </h3>
                            <p class="text-sm text-blue-50 mb-4">
                                Sistema interno de la clínica dental para médicos y personal autorizado.
                            </p>
                        </div>
                        <div class="space-y-2 text-sm text-blue-50">
                            <p>✔ Atención integral odontológica</p>
                            <p>✔ Registro digital de pacientes</p>
                            <p>✔ Control de citas y tratamientos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
