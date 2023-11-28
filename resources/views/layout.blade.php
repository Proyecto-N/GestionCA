<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-----------------------------------------------------------
    -- animate.min.css by Daniel Eden (https://animate.style)
    -- is required for the animation of notifications and slide out panels
    -- you can ignore this step if you already have this file in your project
    --------------------------------------------------------------------------->

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        @auth
            @include("templates.sidebar")
        @endauth

        <main class="flex-grow p-4 {{ Auth::check() ? 'ml-56' : '' }}">
            @yield('content')
        </main>
    </div>
</body>
</html>
