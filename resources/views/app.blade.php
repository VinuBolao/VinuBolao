<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="application-name" content="VinúBolão">
        <meta name="apple-mobile-web-app-title" content="VinúBolão">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="manifest" href="/favicons/site.webmanifest">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-D0R248F7NH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-D0R248F7NH');
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __($page['props']['title'] ?? '') }}
                            </h2>

                            @if(isset($page['props']['subtitle']))
                            <p class="pt-2 text-gray-500">
                                {!! __($page['props']['subtitle'] ?? '') !!}
                            </p>
                            @endif
                        </div>

                        @if(request()->routeIs('bolaos.index') && Auth::user()->master)
                            <a class="btn-primary rounded-3xl p-[0.75rem] has-tooltip" href="{{ route('bolaos.create') }}">
                                <span class="tooltip ml-[-91px]">Adicionar</span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @inertia
                    </div>
                </div>
            </main>

            <footer class="pb-8 text-center text-gray-500 text-xs">
                <span>VinúBolão &copy; 2017-{{ now()->year }} - Criado por
                    <a href="https://www.linkedin.com/in/gustavosantoslima" target="_blank" class="underline">
                        Gustavo Lima
                    </a>
                </span>
            </footer>
        </div>
    </body>
</html>

