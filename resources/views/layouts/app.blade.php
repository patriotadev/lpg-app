<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LPG</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <style>
            .dataTables_length select  {
                width: 70px;
            }

            #carousel {
                width: 100%;
                overflow: hidden;
            }

            .carousel-container {
                display: flex;
                justify-content: start;
                transition: transform 0.5s ease-in-out;
            }

            .carousel-slide {
                flex: 0 0 100%;
                justify-content: start
            }

            .carousel-slide img {
                width: 300px;
                height: 300px;
            }

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#f2ecb3] dark:bg-gray-900">
            @include('layouts.navigation')
            @include('sweetalert::alert')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    <script src="/vendor/jquery/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('.table', {
                "ordering": false
            });
        });
    </script>
    </body>
</html>
