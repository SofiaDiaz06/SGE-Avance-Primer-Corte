<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Paraíso Distribuciones - ERP</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900">
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                <!-- Topbar Superior Oficial (Azul Oscuro) -->
                <div style="background-color: #0b1654;" class="text-white text-xs py-2 px-8 flex justify-between items-center shadow-md">
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

                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white border-b border-gray-200 shadow-xs">
                        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            <!-- Footer Corporativo Oficial -->
            <footer style="background-color: #0b1654; border-top: 4px solid #c83232;" class="text-gray-300 text-center py-4 mt-10 text-sm">
                <p>&copy; {{ date('Y') }} <strong class="text-white">Paraíso Distribuciones S.A.S.</strong> - Todos los derechos reservados. | Sistema ERP v1.0</p>
            </footer>
        </div>
    </body>
</html>