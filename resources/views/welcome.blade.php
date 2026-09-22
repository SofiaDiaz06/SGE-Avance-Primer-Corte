<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paraíso Distribuciones S.A.S. - Sistema ERP</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Carga de Vite para Laravel Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen flex flex-col justify-between">

    <div>
        <!-- Topbar Superior Oficial (Azul Oscuro) -->
        <div style="background-color: #0b1654;" class="text-white text-xs py-2 px-8 flex justify-between items-center">
            <div>
                <span class="bg-white text-gray-900 font-bold px-3 py-1 rounded-full shadow-xs inline-flex items-center gap-1">
                    Ponte en contacto con nosotros ⭐
                </span>
            </div>
            <div class="flex items-center space-x-4 text-base">
                <a href="#" class="hover:text-red-300 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-red-300 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-red-300 transition"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="hover:text-red-300 transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="hover:text-red-300 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- Header / Logo Principal -->
        <header class="bg-white py-6 border-b border-gray-200 text-center">
            <div class="max-w-7xl mx-auto px-6 flex flex-col items-center">
                <div class="flex items-center space-x-2 mb-1">
                    <i style="color: #0b1654;" class="fas fa-boxes text-3xl"></i>
                    <span style="color: #0b1654;" class="text-3xl font-extrabold tracking-tight">paraíso</span>
                </div>
                <span class="text-xs uppercase tracking-[0.25em] text-gray-600 font-bold">D I S T R I B U C I O N E S</span>
            </div>
        </header>

        <!-- Barra de Navegación de Bienvenida -->
        <nav class="bg-white border-b border-gray-200 py-3">
            <div class="max-w-7xl mx-auto px-6 flex justify-center items-center">
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" style="background-color: #c83232;" class="hover:opacity-90 text-white font-bold px-6 py-2.5 rounded-lg shadow transition inline-flex items-center gap-2">
                                <i class="fas fa-chart-line"></i> Ir al Panel ERP
                            </a>
                        @else
                            <a href="{{ route('login') }}" style="color: #0b1654; border-color: #0b1654;" class="hover:bg-gray-50 font-bold px-5 py-2.5 rounded-lg transition inline-flex items-center gap-2 border">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="background-color: #c83232;" class="hover:opacity-90 text-white font-bold px-6 py-2.5 rounded-lg shadow transition inline-flex items-center gap-2">
                                    <i class="fas fa-user-plus"></i> Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <!-- Hero Section con Fondo Azul Oscuro (#0b1654) y Botón Rojo (#c83232) -->
        <section style="background-color: #0b1654; border-bottom: 4px solid #c83232;" class="text-white py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-black mb-6 leading-tight text-white">
                    Productos de Papelería, Escolares, Oficina y Variedades.
                </h1>
                <p class="text-lg text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed font-normal">
                    En Paraíso Distribuciones contamos con los mejores productos originales de alta calidad. Plataforma ERP para control centralizado de inventarios y ventas.
                </p>
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" style="background-color: #c83232;" class="hover:opacity-90 text-white font-bold text-lg px-8 py-3.5 rounded-lg shadow-lg transition inline-block">
                            Acceder al Panel de Control
                        </a>
                    @else
                        <a href="{{ route('login') }}" style="background-color: #c83232;" class="hover:opacity-90 text-white font-bold text-lg px-8 py-3.5 rounded-lg shadow-lg transition inline-block">
                            Ingresar al Sistema
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Módulos Principales del ERP -->
        <section class="max-w-6xl mx-auto py-14 px-6">
            <h2 style="color: #0b1654;" class="text-2xl font-bold text-center mb-8 uppercase tracking-wide">Módulos del Sistema</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center hover:shadow-lg transition">
                    <div style="color: #0b1654;" class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3 style="color: #0b1654;" class="text-lg font-bold mb-2">Inventario y Productos</h3>
                    <p class="text-gray-600 text-sm">Catálogo dinámico de artículos de papelería, alertas automáticas de bajo stock y categorías.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center hover:shadow-lg transition">
                    <div style="color: #c83232;" class="w-14 h-14 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 style="color: #0b1654;" class="text-lg font-bold mb-2">Gestión de Clientes</h3>
                    <p class="text-gray-600 text-sm">Registro de clientes mayoristas, directorio de contactos y seguimiento comercial.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center hover:shadow-lg transition">
                    <div style="color: #0b1654;" class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3 style="color: #0b1654;" class="text-lg font-bold mb-2">Control de Ventas</h3>
                    <p class="text-gray-600 text-sm">Registro de operaciones diarias, indicadores en tiempo real e informes de facturación.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Pie de Página Oficial -->
    <footer style="background-color: #0b1654; border-top: 4px solid #c83232;" class="text-gray-300 py-4 text-center text-sm">
        <p>&copy; {{ date('Y') }} <strong class="text-white">Paraíso Distribuciones S.A.S.</strong> - Todos los derechos reservados. | Cotecnova ERP Project</p>
    </footer>

</body>
</html>