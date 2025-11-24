<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clinica Dental') }}</title>

    <!-- Fuentes / estilos -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        {{-- NAVBAR POR DEFECTO DE BREEZE --}}
        @include('layouts.navigation')

        {{-- ENCABEZADO (Dashboard, Tratamientos, Usuarios, etc.) --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- CONTENIDO PRINCIPAL --}}
        <main>
            {{ $slot }}
        </main>

        {{-- FOOTER GLOBAL DE LA CLÍNICA --}}
        <x-footer />
    </div>

    @stack('modals')

    {{-- ========================= --}}
    {{--  SWEETALERT2 GLOBAL        --}}
    {{-- ========================= --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ==== ALERTAS DE ÉXITO / ERROR DESDE LA SESIÓN ====
            @if (session('success') || session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: @json(session('success') ?? session('status')),
                    confirmButtonColor: '#111827', // gris oscuro
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: @json(session('error')),
                    confirmButtonColor: '#b91c1c',
                    confirmButtonText: 'OK'
                });
            @endif

            // ==== CONFIRMACIÓN BONITA PARA ELIMINAR ====
            document.querySelectorAll('form.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const msg = this.dataset.message || 'Esta acción no se puede deshacer.';

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: msg,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>