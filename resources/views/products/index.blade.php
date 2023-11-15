<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/comp.css')
    </head>
    <body class="background">
        <div class="wrapper">
        <header>

        <!-- Navbar -->
        @include('templates.navbar')
        </div>
        </header>

        <!-- Pagina -->
        <section class="layout">

        <!-- Menu Lateral -->
        <div id="lateral-Menu">

        </div>

        <!-- Contenido  -->
        <div id="content">
            <h1 class="text-center" style="color: rgb(212, 0, 255)">Productos</h1>
        </div>
        </section>


    </body>
</html>
