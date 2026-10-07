<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>El viejo hogar - Menú</title>
    <style>
    /* =========================
       CONFIGURACIÓN GENERAL
    ========================= */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #fae3d1;
        font-family: Arial, sans-serif;
        color: #b55b12;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* =========================
       HEADER
    ========================= */
    .header {
        width: 100%;
        height: 115px;
        background-color: #f6c8a2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 35px;
        box-shadow: 0 4px 12px rgba(135, 68, 13, 0.20);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    /* LOGO + NOMBRE */
    .logo-container {
        display: flex;
        align-items: center;
        gap: 18px;
        text-decoration: none;
        color: inherit;
    }

    .logo {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 50%;
        background-color: #fff;
    }

    .logo-container h1 {
        font-family: "Times New Roman", Times, serif;
        font-size: 34px;
        color: #87440d;
        white-space: nowrap;
    }

    /* =========================
       PARTE DERECHA HEADER
    ========================= */
    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .nav-links {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .nav-btn {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13.5px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
        border: 2px solid #87440d;
    }

    .nav-btn-outline {
        background-color: transparent;
        color: #87440d;
    }

    .nav-btn-outline:hover {
        background-color: #87440d;
        color: white;
    }

    .nav-btn-solid {
        background-color: #87440d;
        color: white;
    }

    .nav-btn-solid:hover {
        background-color: #b55b12;
        border-color: #b55b12;
    }

    /* CARRITO */
    .carrito {
        position: relative;
        width: 50px;
        height: 50px;
        background-color: #87440d;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 23px;
        cursor: pointer;
        transition: 0.3s;
        user-select: none;
    }

    .carrito:hover {
        transform: scale(1.1);
        background-color: #b55b12;
    }

    /* CONTADOR */
    .contador {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 22px;
        height: 22px;
        background-color: #b55b12;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
        box-shadow: 0 2px 5px rgba(0,0,0,0.25);
    }

    /* PERFIL */
    .perfil {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #87440d;
        padding: 3px;
        overflow: hidden;
        border: 3px solid #87440d;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .perfil img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    /* =========================
       TITULO
    ========================= */
    .titulo-menu {
        text-align: center;
        margin: 35px 0 10px;
        font-family: "Times New Roman", Times, serif;
        font-size: 38px;
        color: #87440d;
    }

    .subtitulo-menu {
        text-align: center;
        font-size: 15px;
        color: #87440d;
        margin-bottom: 30px;
    }

    /* =========================
       MENU GRID
    ========================= */
    .menu {
        width: 92%;
        max-width: 1400px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 28px;
        padding-bottom: 60px;
    }

    /* CARDS */
    .card {
        background-color: #f1ac74;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(135, 68, 13, 0.20);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(135, 68, 13, 0.30);
    }

    /* IMAGEN */
    .imagen-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background-color: #f6c8a2;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .imagen-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .card:hover .imagen-container img {
        transform: scale(1.08);
    }

    .card-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(135, 68, 13, 0.9);
        color: #fff;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 11.5px;
        font-weight: bold;
    }

    /* CONTENIDO CARD */
    .card-content {
        padding: 18px;
        text-align: center;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card h3 {
        color: #b55b12;
        font-family: "Times New Roman", Times, serif;
        font-size: 23px;
        margin-bottom: 8px;
    }

    .descripcion {
        color: #87440d;
        font-size: 13.5px;
        line-height: 1.45;
        min-height: 55px;
        margin-bottom: 10px;
        flex: 1;
    }

    .precio {
        color: #87440d;
        font-size: 22px;
        font-weight: bold;
        margin: 10px 0 16px;
    }

    .local-info {
        font-size: 11.5px;
        color: #582c09;
        margin-bottom: 12px;
        opacity: 0.9;
    }

    /* BOTON */
    .btn-carrito {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 10px;
        background-color: #87440d;
        color: white;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-carrito:hover {
        background-color: #b55b12;
        transform: scale(1.03);
    }

    .btn-carrito:active {
        transform: scale(0.97);
    }

    /* Toast */
    .toast-popup {
        position: fixed;
        bottom: 25px;
        right: 25px;
        background-color: #87440d;
        color: white;
        padding: 14px 22px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: bold;
        box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        transform: translateY(100px);
        opacity: 0;
        transition: 0.3s ease;
        z-index: 1000;
    }

    .toast-popup.show {
        transform: translateY(0);
        opacity: 1;
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {
        .menu { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 800px) {
        .menu { grid-template-columns: repeat(2, 1fr); }
        .logo-container h1 { font-size: 26px; }
        .header { padding: 10px 20px; }
    }

    @media (max-width: 550px) {
        .header { height: auto; padding: 15px; flex-direction: column; gap: 15px; }
        .menu { grid-template-columns: 1fr; }
        .titulo-menu { font-size: 30px; }
    }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <a href="/" class="logo-container">
            <img src="{{ asset('Otros/Logo 500x500 px.png') }}"
                 alt="Logo El viejo hogar"
                 class="logo"
                 onerror="this.onerror=null; this.src='{{ asset('Logo 500x500 px.jpeg') }}';">
            <h1>El viejo hogar</h1>
        </a>

        <div class="header-right">
            <div class="nav-links">
                <a href="/menu" class="nav-btn nav-btn-outline" title="Ir al Menú Avanzado">Menú Completo</a>
                <a href="/admin" class="nav-btn nav-btn-solid" title="Panel de Administración">Admin</a>
            </div>

            <div class="carrito" id="cartButton" title="Carrito de compras">
                🛒
                <span class="contador" id="cartCounter">0</span>
            </div>

            <div class="perfil">
                <img src="{{ asset('images (1).jpg') }}"
                     alt="Foto de perfil"
                     onerror="this.onerror=null; this.src='{{ asset('Otros/png-transparent-user-icon.png') }}';">
            </div>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main>
        <h2 class="titulo-menu">Nuestro menú</h2>
        <p class="subtitulo-menu">Selección tradicional directamente de nuestra cocina casera (Base de Datos SQLite)</p>

        <section class="menu" id="dishesList">
            @forelse($platillos as $p)
                <article class="card" data-id="{{ $p->id }}">
                    <div class="imagen-container">
                        @if($p->imagen)
                            <img src="{{ asset($p->imagen) }}"
                                 alt="{{ $p->nombre }}"
                                 onerror="this.onerror=null; this.src='{{ asset('Otros/20200731162901pollo-asado.jpg') }}';">
                        @else
                            <img src="{{ asset('Otros/20200731162901pollo-asado.jpg') }}" alt="{{ $p->nombre }}">
                        @endif
                        <span class="card-badge">{{ $p->bandera ?? '🍽️' }} {{ $p->pais ?? 'Tradicional' }}</span>
                    </div>

                    <div class="card-content">
                        <h3>{{ $p->nombre }}</h3>
                        <p class="descripcion">{{ $p->descripcion }}</p>
                        <div class="local-info">📍 {{ $p->local ?? 'Sucursal Centro' }} ({{ $p->ciudad ?? 'Córdoba' }})</div>
                        <p class="precio">${{ number_format($p->precio, 0, ',', '.') }}</p>

                        <button class="btn-carrito" data-name="{{ $p->nombre }}" data-price="{{ $p->precio }}">
                            Añadir al carrito
                        </button>
                    </div>
                </article>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; font-size: 18px;">
                    No se encontraron platillos disponibles en la base de datos SQLite.
                </div>
            @endforelse
        </section>
    </main>

    <div class="toast-popup" id="toast">¡Platillo añadido al carrito!</div>

    <!-- JAVASCRIPT -->
    <script>
        let cantidad = 0;
        const botones = document.querySelectorAll(".btn-carrito");
        const contador = document.getElementById("cartCounter");
        const toast = document.getElementById("toast");

        function showNotification(text) {
            toast.textContent = text;
            toast.classList.add("show");
            setTimeout(() => {
                toast.classList.remove("show");
            }, 2000);
        }

        botones.forEach(boton => {
            boton.addEventListener("click", () => {
                cantidad++;
                contador.textContent = cantidad;
                const dishName = boton.getAttribute("data-name") || "Platillo";

                const originalText = boton.textContent;
                boton.textContent = "✓ ¡Añadido!";
                boton.style.backgroundColor = "#2e7d32";

                showNotification(`✓ Añadido: ${dishName}`);

                setTimeout(() => {
                    boton.textContent = originalText;
                    boton.style.backgroundColor = "";
                }, 1000);
            });
        });
    </script>
</body>
</html>
