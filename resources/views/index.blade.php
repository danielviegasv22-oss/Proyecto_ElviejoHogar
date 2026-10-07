<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>El Viejo Hogar - Un olor tan familiar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-50: #fdf1e8;
            --primary-100: #fae3d1;
            --primary-200: #f6c8a2;
            --primary-300: #f1ac74;
            --primary-400: #ed9145;
            --primary-500: #b55b12;
            --primary-600: #87440d;
            --primary-700: #582c09;
            --primary-800: #2a1504;
            --primary-900: #170c02;
            --font-serif: 'Cormorant Garamond', Georgia, serif;
            --font-sans: 'Outfit', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --shadow-sm: 0 4px 12px rgba(88, 44, 9, 0.08);
            --shadow-md: 0 10px 30px rgba(88, 44, 9, 0.12);
            --shadow-lg: 0 20px 45px rgba(88, 44, 9, 0.18);
            --transition-smooth: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-sans);
            background-color: var(--primary-900);
            color: var(--primary-50);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            background-image:
                linear-gradient(135deg, rgba(23, 12, 2, 0.78) 0%, rgba(42, 21, 4, 0.72) 50%, rgba(88, 44, 9, 0.65) 100%),
                url('../Otros/20200731162901pollo-asado.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .site-header {
            width: 100%;
            padding: 1.5rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 100;
        }
        .header-actions-left { display: flex; align-items: center; gap: 1.25rem; }
        .btn-iniciar-sesion {
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
            padding: 0.75rem 1.6rem; font-family: var(--font-sans); font-size: 0.95rem;
            font-weight: 600; letter-spacing: 0.3px; color: var(--primary-50);
            background-color: var(--primary-600); border: 2px solid var(--primary-600);
            border-radius: 9999px; text-decoration: none; cursor: pointer;
            box-shadow: 0 4px 14px rgba(135, 68, 13, 0.25); transition: var(--transition-smooth);
        }
        .btn-iniciar-sesion:hover { background-color: var(--primary-500); border-color: var(--primary-500); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(181, 91, 18, 0.35); }
        .btn-crear-cuenta {
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
            padding: 0.75rem 1.6rem; font-family: var(--font-sans); font-size: 0.95rem;
            font-weight: 600; letter-spacing: 0.3px; color: var(--primary-600);
            background-color: var(--primary-50); border: 2px solid var(--primary-600);
            border-radius: 9999px; text-decoration: none; cursor: pointer;
            box-shadow: 0 4px 12px rgba(135, 68, 13, 0.08); transition: var(--transition-smooth);
        }
        .btn-crear-cuenta:hover { background-color: var(--primary-600); color: var(--primary-50); border-color: var(--primary-600); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(135, 68, 13, 0.3); }
        .hero-main {
            flex: 1; display: flex; flex-direction: column; align-items: center;
            justify-content: center; text-align: center; padding: 2rem 1.5rem 4rem;
            position: relative; z-index: 10;
        }
        .hero-card { display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; max-width: 600px; width: 100%; animation: fadeInScale 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .logo-wrapper {
            position: relative; display: inline-block; margin-bottom: 2rem; border-radius: 50%; padding: 15px;
            background: radial-gradient(circle, rgba(253, 241, 232, 0.95) 60%, rgba(246, 200, 162, 0.3) 100%);
            box-shadow: 0 0 0 1px rgba(241, 172, 116, 0.35), 0 15px 45px rgba(88, 44, 9, 0.14), 0 0 70px rgba(237, 145, 69, 0.18);
            transition: var(--transition-smooth);
        }
        .logo-wrapper:hover { transform: scale(1.03) translateY(-4px); box-shadow: 0 0 0 1px rgba(241, 172, 116, 0.5), 0 22px 55px rgba(88, 44, 9, 0.22), 0 0 90px rgba(237, 145, 69, 0.28); }
        .hero-logo { width: 280px; height: 280px; max-width: 75vw; max-height: 75vw; object-fit: cover; border-radius: 50%; display: block; border: 3px solid var(--primary-200); filter: drop-shadow(0 4px 8px rgba(42, 21, 4, 0.08)); }
        .scent-aroma { position: absolute; top: -20px; left: 50%; transform: translateX(-50%); width: 40px; height: 40px; opacity: 0.6; pointer-events: none; animation: floatAroma 3s ease-in-out infinite alternate; }
        .hero-tagline { font-family: var(--font-serif); font-size: 2.85rem; font-weight: 600; font-style: italic; color: var(--primary-100); line-height: 1.25; letter-spacing: 0.8px; position: relative; display: inline-block; text-shadow: 0 4px 18px rgba(0, 0, 0, 0.75), 0 1px 3px rgba(0, 0, 0, 0.9); }
        .hero-tagline::after { content: ""; display: block; width: 70px; height: 3px; background: linear-gradient(90deg, transparent, var(--primary-400), transparent); margin: 1.2rem auto 0; border-radius: 2px; box-shadow: 0 2px 8px rgba(237, 145, 69, 0.4); }
        .bg-decorative-ring { position: absolute; border-radius: 50%; border: 1px dashed rgba(241, 172, 116, 0.15); pointer-events: none; z-index: 1; }
        .ring-1 { width: 450px; height: 450px; top: 50%; left: 50%; transform: translate(-50%, -50%); animation: rotateSlow 40s linear infinite; }
        .ring-2 { width: 580px; height: 580px; top: 50%; left: 50%; transform: translate(-50%, -50%); border: 1px solid rgba(241, 172, 116, 0.15); }
        .site-footer { padding: 1.25rem 2rem; text-align: center; font-size: 0.875rem; color: var(--primary-200); opacity: 0.9; letter-spacing: 0.4px; z-index: 10; text-shadow: 0 2px 6px rgba(0,0,0,0.6); }
        @keyframes fadeInScale { 0% { opacity: 0; transform: translateY(20px) scale(0.96); } 100% { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes floatAroma { 0% { transform: translateX(-50%) translateY(0) scale(0.9); opacity: 0.3; } 100% { transform: translateX(-50%) translateY(-12px) scale(1.1); opacity: 0.7; } }
        @keyframes rotateSlow { from { transform: translate(-50%, -50%) rotate(0deg); } to { transform: translate(-50%, -50%) rotate(360deg); } }
        @media (max-width: 768px) {
            .site-header { padding: 1.25rem 1.5rem; }
            .header-actions-left { width: 100%; justify-content: center; gap: 0.85rem; }
            .btn-iniciar-sesion, .btn-crear-cuenta { padding: 0.65rem 1.2rem; font-size: 0.88rem; flex: 1; max-width: 160px; text-align: center; }
            .hero-logo { width: 220px; height: 220px; }
            .hero-tagline { font-size: 2.1rem; }
            .ring-1, .ring-2 { display: none; }
        }
        @media (max-width: 420px) { .hero-tagline { font-size: 1.75rem; } .hero-logo { width: 180px; height: 180px; } }
    </style>
</head>
<body>
    <div class="bg-decorative-ring ring-1"></div>
    <div class="bg-decorative-ring ring-2"></div>

    <header class="site-header">
        <div class="header-actions-left">
            <a href="/login" class="btn-iniciar-sesion" id="btn-login">Iniciar sesión</a>
            <a href="/registro" class="btn-crear-cuenta" id="btn-register">Crear cuenta</a>
        </div>
    </header>

    <main class="hero-main">
        <div class="hero-card">
            <svg class="scent-aroma" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" color="#ed9145">
                <path d="M6 19c0-3.5 3-4.5 3-7s-3-3.5-3-7"/>
                <path d="M12 19c0-3.5 3-4.5 3-7s-3-3.5-3-7"/>
                <path d="M18 19c0-3.5 3-4.5 3-7s-3-3.5-3-7"/>
            </svg>
            <div class="logo-wrapper">
                <img
                    src="../Otros/Logo 500x500 px.png"
                    alt="Logo El Viejo Hogar"
                    class="hero-logo"
                    onerror="this.onerror=null; this.src='../Proyecto_ElviejoHogar/Logo 500x500 px.jpeg';"
                >
            </div>
            <h1 class="hero-tagline">"Un olor tan familiar..."</h1>
        </div>
    </main>

    <footer class="site-footer">
        <p>&copy; El Viejo Hogar - Tradición y sabor familiar</p>
    </footer>
</body>
</html>
