{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Dental Sonrisa Segura</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Estilo Futurista Médico-Tech --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * { font-family: 'Inter', sans-serif; }

        body {
            background: #f3f7fb;
            color: #1f2937;
        }

        /* HEADER */
        header {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid #e5e7eb;
        }

        /* HERO Futurista */
        .hero {
            padding: 130px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0474ad 0%, #29c2e6 48%, #02a6c2 100%);
        }

        /* Luces futuristas */
        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0) 70%);
            filter: blur(90px);
            opacity: 0.4;
            z-index: 0;
        }

        .hero::before {
            top: -100px;
            left: -100px;
        }

        .hero::after {
            bottom: -120px;
            right: -120px;
        }

        .hero h1 {
            font-size: 3.3rem;
            font-weight: 800;
            letter-spacing: -1.4px;
            position: relative;
            z-index: 2;
        }

        .hero p {
            position: relative;
            z-index: 2;
            opacity: .95;
            font-size: 1.2rem;
            max-width: 680px;
            margin: 20px auto 0;
        }

        /* BOTONES */
        .btn-main {
            background: white;
            color: #0676a5;
            padding: 14px 34px;
            border-radius: 14px;
            font-weight: 600;
            border: none;
            transition: .25s;
            font-size: 1.05rem;
            box-shadow: 0 10px 25px rgba(255,255,255,0.4);
        }
        .btn-main:hover {
            background: #e9faff;
            transform: translateY(-4px);
        }

        .btn-glass {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(12px);
            color: white;
            padding: 14px 34px;
            border-radius: 14px;
            font-weight: 600;
            transition: .25s;
            font-size: 1.05rem;
            border: 1px solid rgba(255,255,255,0.4);
        }
        .btn-glass:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-4px);
        }

        /* SERVICIOS PREMIUM TECH */
        .service-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 25px #00000012;
            transition: .3s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            border-color: #22b8d9;
            box-shadow: 0 12px 35px #00000022;
        }

        .service-icon {
            width: 82px;
            height: 82px;
            background: linear-gradient(135deg, #e3f6ff, #c9efff);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            color: #0c9ec4;
        }

        /* FOOTER */
        footer {
            background: #055a75;
            color: white;
            padding: 65px 20px;
            text-align: center;
            margin-top: 80px;
        }
    </style>
</head>

<body>

    {{-- NAV --}}
    <header>
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-3">
                <x-application-logo class="w-12 h-12" />
                <p class="text-xl font-bold text-gray-700">Clínica Dental Sonrisa Segura</p>
            </div>

            <div class="flex gap-3">
                @auth
                    <a href="{{ route('home') }}"
                       class="px-4 py-2 bg-[#0a90bf] text-white rounded-lg hover:bg-[#08759a] transition">
                        Ir a Home
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 border-2 border-[#0a90bf] text-[#0a90bf] font-semibold rounded-lg hover:bg-[#e6f9ff] transition">
                        Iniciar sesión
                    </a>

                    {{-- Botón corregido: fondo blanco, letras negras --}}
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-white text-black border-2 border-black font-semibold rounded-lg hover:bg-gray-100 transition">
                        Crear cuenta
                    </a>
                @endauth
            </div>
        </div>
    </header>

    {{-- HERO FUTURISTA --}}
    <section class="hero">
        <h1>Un futuro más seguro para tu sonrisa</h1>
        <p>Atención médica odontológica con tecnología avanzada, precisión profesional y un enfoque humano.  
        En Sonrisa Segura cuidamos tu salud con innovación.</p>

        <div class="mt-10 flex justify-center gap-4 flex-wrap">
            <a href="{{ route('login') }}" class="btn-main">Reservar cita</a>
            <a href="#servicios" class="btn-glass">Ver servicios</a>
        </div>
    </section>

    {{-- SERVICIOS --}}
    <section id="servicios" class="max-w-7xl mx-auto px-6 py-20">
        <h2 class="text-3xl font-semibold text-center text-gray-800">Servicios con Tecnología Avanzada</h2>
        <p class="text-center text-gray-500 max-w-xl mx-auto mt-2 mb-12">
            Diagnóstico preciso, tratamientos modernos y resultados seguros.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 3h2l1 4h8l1-4h2l-1 4h1a1 1 0 010 2h-1.3l-1.4 9.2A2 2 0 0114.3 20H9.7a2 2 0 01-2-1.8L6.3 9H5a1 1 0 010-2h1L5 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-center mt-4">Limpiezas Avanzadas</h3>
                <p class="text-gray-600 text-center mt-2">
                    Equipos modernos que eliminan placa y sarro con precisión.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2 7 7l4 4-4 4 5 5 9-9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-center mt-4">Blanqueamiento Premium</h3>
                <p class="text-gray-600 text-center mt-2">
                    Resultados rápidos, seguros y clínicamente aprobados.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 3h14v4H5zm2 6h10v12H7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-center mt-4">Restauraciones Precisas</h3>
                <p class="text-gray-600 text-center mt-2">
                    Coronas, resinas y tratamientos digitales de alta precisión.
                </p>
            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <x-application-logo class="w-14 h-14 mx-auto" />
        <p class="text-xl font-semibold mt-2">Clínica Dental Sonrisa Segura</p>
        <p class="text-white/80 text-sm mt-1">Tecnología, confianza y cuidado profesional.</p>

        <p class="mt-4 text-white/60 text-xs">
            © {{ date('Y') }} Clínica Dental Sonrisa Segura — Todos los derechos reservados.
        </p>
    </footer>

</body>
</html>


