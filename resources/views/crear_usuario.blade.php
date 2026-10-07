<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Cuenta | El Viejo Hogar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-1:#fdf1e8;--color-2:#fae3d1;--color-3:#f6c8a2;--color-4:#f1ac74;
            --color-5:#ed9145;--color-6:#b55b12;--color-7:#87440d;--color-8:#582c09;
            --color-9:#2a1504;--color-10:#170c02;
            --font-title:'Cormorant Garamond',Georgia,serif;
            --font-body:'Outfit',Arial,sans-serif;--transition:all 0.3s ease;
        }
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:var(--font-body);background-color:var(--color-10);color:var(--color-1);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:30px 15px;background-image:linear-gradient(135deg,rgba(23,12,2,0.85) 0%,rgba(42,21,4,0.88) 100%),url('../Otros/20200731162901pollo-asado.jpg');background-size:cover;background-position:center;background-attachment:fixed;}
        .register-card{width:100%;max-width:520px;background:rgba(250,227,209,0.96);backdrop-filter:blur(12px);border:2px solid var(--color-3);border-radius:24px;padding:38px 34px;box-shadow:0 20px 50px rgba(0,0,0,0.45);color:var(--color-10);position:relative;animation:fadeIn 0.5s ease-out;}
        @keyframes fadeIn{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
        .register-header{text-align:center;margin-bottom:25px;}
        .register-logo{width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--color-5);box-shadow:0 4px 15px rgba(135,68,13,0.25);margin-bottom:12px;background-color:var(--color-1);}
        .register-title{font-family:var(--font-title);font-size:32px;color:var(--color-7);line-height:1.1;}
        .register-subtitle{font-size:14px;color:var(--color-6);margin-top:4px;}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
        @media(max-width:480px){.form-row{grid-template-columns:1fr;gap:0;}}
        .form-group{margin-bottom:16px;text-align:left;}
        label{display:block;font-size:13.5px;font-weight:600;color:var(--color-7);margin-bottom:6px;}
        label span.required{color:#d32f2f;margin-left:2px;}
        .input-wrapper{position:relative;display:flex;align-items:center;}
        .input-icon{position:absolute;left:14px;font-size:16px;color:var(--color-6);pointer-events:none;}
        input,select{width:100%;padding:11px 14px 11px 40px;border:1.5px solid var(--color-3);border-radius:12px;background-color:#fff;color:var(--color-10);font-family:var(--font-body);font-size:14px;outline:none;transition:var(--transition);}
        input:focus,select:focus{border-color:var(--color-5);box-shadow:0 0 0 3px rgba(237,145,69,0.2);}
        .help-text{font-size:11.5px;color:var(--color-6);margin-top:4px;}
        .alert-box{padding:12px 14px;border-radius:12px;font-size:13.5px;margin-bottom:18px;text-align:center;line-height:1.4;}
        .alert-error{background-color:#fde8e8;border:1px solid #f98080;color:#9b1c1c;}
        .alert-success{background-color:#def7ec;border:1px solid #31c48d;color:#03543f;}
        .btn-register{width:100%;padding:13px;background-color:var(--color-7);color:var(--color-1);border:none;border-radius:12px;font-family:var(--font-body);font-size:16px;font-weight:600;cursor:pointer;transition:var(--transition);box-shadow:0 4px 14px rgba(135,68,13,0.25);margin-top:10px;}
        .btn-register:hover{background-color:var(--color-6);transform:translateY(-2px);box-shadow:0 6px 18px rgba(181,91,18,0.35);}
        .register-footer{text-align:center;font-size:13.5px;color:var(--color-8);margin-top:20px;display:flex;flex-direction:column;gap:8px;}
        .register-footer a{color:var(--color-6);text-decoration:none;font-weight:600;transition:var(--transition);}
        .register-footer a:hover{color:var(--color-7);text-decoration:underline;}
        .link-home{font-size:12.5px;color:var(--color-7)!important;opacity:0.85;}
    </style>
</head>
<body>
    <div class="register-card">
        <div class="register-header">
            <img src="../Otros/Logo 500x500 px.png" alt="El Viejo Hogar" class="register-logo"
                 onerror="this.onerror=null;this.src='../Proyecto_ElviejoHogar/Logo 500x500 px.jpeg';">
            <h1 class="register-title">Crear Usuario</h1>
            <p class="register-subtitle">Únete a la familia de El Viejo Hogar</p>
        </div>

        @if(isset($errors) && $errors->any())
            <div class="alert-box alert-error">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert-box alert-success">{{ session('success') }}</div>
        @endif

        <form id="registerForm" method="POST" action="/registro">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="nombreInput">Nombre <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input type="text" id="nombreInput" name="nombre" placeholder="Ej: Juan" required autocomplete="given-name" value="{{ old('nombre') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellidoInput">Apellido <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input type="text" id="apellidoInput" name="apellido" placeholder="Ej: Pérez" required autocomplete="family-name" value="{{ old('apellido') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="gmailInput">Gmail <span class="required">*</span></label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" id="gmailInput" name="gmail" placeholder="usuario@gmail.com" required autocomplete="email" value="{{ old('gmail') }}">
                </div>
                <div class="help-text">Ingresa tu correo con terminación @gmail.com</div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nacionalidadInput">Nacionalidad <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">🌎</span>
                        <select id="nacionalidadInput" name="nacionalidad" required>
                            <option value="">Selecciona tu país</option>
                            @foreach(['Argentina','España','México','China','Chile','Uruguay','Colombia','Perú','Paraguay','Bolivia','Venezuela','Ecuador','Estados Unidos','Italia','Otro'] as $pais)
                                <option value="{{ $pais }}" {{ old('nacionalidad') === $pais ? 'selected' : '' }}>{{ $pais }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ciudadInput">Ciudad donde vive <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">🏙️</span>
                        <input type="text" id="ciudadInput" name="ciudad" placeholder="Ej: Buenos Aires" required autocomplete="address-level2" value="{{ old('ciudad') }}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="passwordInput">Contraseña <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" id="passwordInput" name="password" placeholder="Mínimo 4 caracteres" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordConfirmInput">Confirmar Contraseña <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" id="passwordConfirmInput" name="password_confirmation" placeholder="Repite tu contraseña" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-register" id="btnSubmitRegister">Crear mi cuenta</button>
        </form>

        <div class="register-footer">
            <div>¿Ya tienes una cuenta? <a href="/login" id="link-login">Inicia sesión aquí</a></div>
            <div><a href="/" class="link-home" id="link-home">← Volver a la página principal</a></div>
        </div>
    </div>
</body>
</html>
