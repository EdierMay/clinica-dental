{{-- resources/views/components/application-logo.blade.php --}}
@props(['class' => ''])

<svg {{ $attributes->merge(['class' => 'w-16 h-16 '.$class]) }}
     viewBox="0 0 64 64"
     xmlns="http://www.w3.org/2000/svg">

    <!-- DEFINICIÓN DE DEGRADADO -->
    <defs>
        <linearGradient id="clinicGradient" x1="0" y1="0" x2="1" y2="1">
            <!-- Azul profesional -->
            <stop offset="0%" stop-color="#0EA5E9" />
            <stop offset="25%" stop-color="#0284C7" />

            <!-- Verde dental -->
            <stop offset="60%" stop-color="#22C55E" />
            <stop offset="75%" stop-color="#16A34A" />

            <!-- Gris minimalista -->
            <stop offset="100%" stop-color="#D1D5DB" />
        </linearGradient>
    </defs>

    <!-- Círculo de fondo degradado -->
    <circle cx="32" cy="32" r="30" fill="url(#clinicGradient)" />

    <!-- Dibujo del diente (COLOR BLANCO) -->
    <path
        d="M22 18c3-4 7-5 10-5s7 1 10 5c2 3 2 7 1 10-1 3-3 5-4 11-.6 3-1.5 6-3 6-1.8 0-2.6-2.8-3.5-5.3-.5-1.5-1-3.7-2.5-3.7s-2 2.2-2.6 3.7C26 43.2 25.2 46 23.4 46c-1.5 0-2.4-3-3-6-1.1-6-3-8-4-11-1-3-.8-7 1.6-11Z"
        fill="white"
    />
</svg>
