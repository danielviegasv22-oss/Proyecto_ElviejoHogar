<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'El Viejo Hogar') }}</title>

    <!-- Pure CSS Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <header class="header">
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo El Viejo Hogar" class="logo" onerror="this.style.display='none'">
            <h1>El Viejo Hogar</h1>
        </a>

        <div class="header-right">
            <button type="button" class="carrito" aria-label="Ver carrito">
                🛒
                <span class="contador">0</span>
            </button>
            <div class="perfil">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Perfil" onerror="this.src='{{ asset('images/producto-default.jpg') }}'">
            </div>
        </div>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <!-- Vanilla JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
