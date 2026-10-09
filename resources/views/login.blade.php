<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión | El Viejo Hogar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-1: #fdf1e8; --color-2: #fae3d1; --color-3: #f6c8a2;
            --color-4: #f1ac74; --color-5: #ed9145; --color-6: #b55b12;
            --color-7: #87440d; --color-8: #582c09; --color-9: #2a1504; --color-10: #170c02;
            --font-title: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Outfit', Arial, sans-serif;
            --transition: all 0.3s ease;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-body); background-color: var(--color-10); color: var(--color-1);
            min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 25px 15px;
            background-image: linear-gradient(135deg, rgba(23, 12, 2, 0.85) 0%, rgba(42, 21, 4, 0.88) 100%), url('../Otros/20200731162901pollo-asado.jpg');
            background-size: cover; background-position: center; background-attachment: fixed;
        }
        .login-card {
            width: 100%; max-width: 440px; background: rgba(250, 227, 209, 0.96);
            backdrop-filter: blur(12px); border: 2px solid var(--color-3); border-radius: 24px;
            padding: 38px 32px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45); color: var(--color-10);
            position: relative; animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
        .login-header { text-align: center; margin-bottom: 25px; }
        .login-logo { width: 85px; height: 85px; border-radius: 50%; object-fit: cover; border: 3px solid var(--color-5); box-shadow: 0 4px 15px rgba(135, 68, 13, 0.25); margin-bottom: 12px; background-color: var(--color-1); }
        .login-title { font-family: var(--font-title); font-size: 32px; color: var(--color-7); line-height: 1.1; }
        .login-subtitle { font-size: 14px; color: var(--color-6); margin-top: 4px; }
        .credential-tip { background-color: var(--color-1); border: 1px dashed var(--color-5); border-radius: 12px; padding: 12px 14px; margin-bottom: 22px; font-size: 12.5px; color: var(--color-8); line-height: 1.45; }
        .credential-tip strong { color: var(--color-7); }
        .form-group { margin-bottom: 18px; text-align: left; }
        label { display: block; font-size: 13.5px; font-weight: 600; color: var(--color-7); margin-bottom: 6px; }
        .input-wrapper { position: relative; display: flex; align-items: center; }
        .input-icon { position: absolute; left: 14px; font-size: 17px; color: var(--color-6); pointer-events: none; }
        input { width: 100%; padding: 12px 14px 12px 42px; border: 1.5px solid var(--color-3); border-radius: 12px; background-color: #fff; color: var(--color-10); font-family: var(--font-body); font-size: 14.5px; outline: none; transition: var(--transition); }
        input:focus { border-color: var(--color-5); box-shadow: 0 0 0 3px rgba(237, 145, 69, 0.2); }
        .error-alert { background-color: #fde8e8; border: 1px solid #f98080; color: #9b1c1c; padding: 10px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 16px; text-align: center; }
        .btn-submit { width: 100%; padding: 13px; background-color: var(--color-7); color: var(--color-1); border: none; border-radius: 12px; font-family: var(--font-body); font-size: 15.5px; font-weight: 600; cursor: pointer; transition: var(--transition); box-shadow: 0 4px 14px rgba(135, 68, 13, 0.25); margin-top: 6px; }
        .btn-submit:hover { background-color: var(--color-6); transform: translateY(-2px); box-shadow: 0 6px 18px rgba(181, 91, 18, 0.35); }
        .divider { display: flex; align-items: center; text-align: center; margin: 20px 0 16px; color: var(--color-6); font-size: 12px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; }
        .divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px solid var(--color-3); }
        .divider span { padding: 0 10px; }
        .quick-access-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px; }
        .btn-quick { padding: 10px 8px; border-radius: 10px; font-family: var(--font-body); font-size: 12.5px; font-weight: 600; cursor: pointer; transition: var(--transition); display: flex; flex-direction: column; align-items: center; gap: 4px; text-align: center; }
        .btn-quick-admin { background-color: var(--color-5); color: var(--color-1); border: 1px solid var(--color-6); }
        .btn-quick-admin:hover { background-color: var(--color-6); transform: translateY(-2px); }
        .btn-quick-client { background-color: var(--color-1); color: var(--color-7); border: 1px solid var(--color-4); }
        .btn-quick-client:hover { background-color: var(--color-2); border-color: var(--color-5); transform: translateY(-2px); }
        .login-footer-links { text-align: center; font-size: 13.5px; color: var(--color-8); display: flex; flex-direction: column; gap: 10px; margin-top: 15px; }
        .login-footer-links a { color: var(--color-6); text-decoration: none; font-weight: 600; transition: var(--transition); }
        .login-footer-links a:hover { color: var(--color-7); text-decoration: underline; }
        .link-home { font-size: 12.5px; color: var(--color-7) !important; opacity: 0.85; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <img src="../Otros/Logo 500x500 px.png" alt="El Viejo Hogar" class="login-logo"
                 onerror="this.onerror=null; this.src='../Proyecto_ElviejoHogar/Logo 500x500 px.jpeg';">
            <h1 class="login-title">Iniciar Sesión</h1>
            <p class="login-subtitle">Bienvenido a El Viejo Hogar</p>
        </div>

        <div class="credential-tip">
            <div>👑 <strong>Admin:</strong> usuario: <code>admin</code> | pass: <code>12345</code> (abre panel de administrador)</div>
            <div style="margin-top:3px">👤 <strong>Cliente:</strong> usuario: <code>cliente</code> | pass: <code>12345</code> (abre menú de pedidos)</div>
        </div>

        @if(isset($errors) && $errors->has('error'))
            <div class="error-alert">{{ $errors->first('error') }}</div>
        @endif

        <form id="loginForm" method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="usernameInput">Usuario o Gmail</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input type="text" id="usernameInput" name="usuario" placeholder="admin o cliente" required autocomplete="username" value="{{ old('usuario') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordInput">Contraseña</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" id="passwordInput" name="password" placeholder="••••••••" required autocomplete="current-password">
                </div>
            </div>
            <button type="submit" class="btn-submit" id="btn-login-submit">Ingresar al sistema</button>
        </form>



        <div class="login-footer-links">
            <div>¿No tienes cuenta? <a href="/registro" id="link-registro">Crear una cuenta</a></div>
            <div><a href="/" class="link-home" id="link-home">← Volver al inicio</a></div>
        </div>
    </div>
</body>
</html>
