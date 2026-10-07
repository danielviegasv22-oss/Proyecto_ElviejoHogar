<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Configuración y Administración | El Viejo Hogar</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* =========================
           PALETA DE COLORES OFICIAL
           ========================= */
        :root {
            --color-1: #fdf1e8;
            --color-2: #fae3d1;
            --color-3: #f6c8a2;
            --color-4: #f1ac74;
            --color-5: #ed9145;
            --color-6: #b55b12;
            --color-7: #87440d;
            --color-8: #582c09;
            --color-9: #2a1504;
            --color-10: #170c02;

            --font-title: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Outfit', Arial, Helvetica, sans-serif;
            --shadow-card: 0 6px 18px rgba(23, 12, 2, 0.09);
            --shadow-hover: 0 14px 28px rgba(88, 44, 9, 0.18);
            --transition: all 0.28s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--color-1);
            color: var(--color-10);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 10% 15%, rgba(246, 200, 162, 0.35) 0%, transparent 35%),
                radial-gradient(circle at 90% 85%, rgba(241, 172, 116, 0.25) 0%, transparent 40%);
            background-attachment: fixed;
            position: relative;
        }

        /* =========================
           HEADER
           ========================= */
        .header {
            width: 100%;
            height: 84px;
            background-color: var(--color-7);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            box-shadow: 0 4px 18px rgba(23, 12, 2, 0.25);
            position: sticky;
            top: 0;
            z-index: 100;
            gap: 15px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--color-1);
            font-size: 22px;
            font-weight: 700;
            font-family: var(--font-title);
            cursor: pointer;
            flex-shrink: 0;
        }

        .logo img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 2px solid var(--color-4);
            object-fit: cover;
            background-color: var(--color-2);
        }

        .logo span.badge-admin {
            font-size: 11px;
            font-family: var(--font-body);
            background-color: var(--color-5);
            color: var(--color-1);
            padding: 2px 8px;
            border-radius: 12px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .header-center {
            display: flex;
            align-items: center;
            gap: 14px;
            flex: 1;
            max-width: 600px;
            margin: 0 15px;
        }

        .search-container {
            display: flex;
            flex: 1;
            height: 40px;
            position: relative;
        }

        .search-container input {
            width: 100%;
            border: none;
            outline: none;
            padding: 0 40px 0 16px;
            font-size: 14px;
            font-family: var(--font-body);
            background-color: var(--color-2);
            color: var(--color-10);
            border-radius: 20px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.06);
            transition: var(--transition);
        }

        .search-container input:focus {
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(237, 145, 69, 0.35);
        }

        .search-button {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 15px;
            color: var(--color-7);
            cursor: pointer;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .btn-view-client {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 15px;
            background-color: var(--color-5);
            color: var(--color-1);
            text-decoration: none;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }

        .btn-view-client:hover {
            background-color: var(--color-4);
            transform: translateY(-1px);
        }

        .profile-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: rgba(253, 241, 232, 0.12);
            padding: 5px 12px 5px 6px;
            border-radius: 25px;
            border: 1px solid rgba(246, 200, 162, 0.25);
            color: var(--color-1);
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--color-4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
        }

        .btn-logout {
            background: none;
            border: 1px solid var(--color-4);
            color: var(--color-2);
            padding: 5px 11px;
            border-radius: 16px;
            font-size: 12px;
            font-family: var(--font-body);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        /* =========================
           CONTENEDOR PRINCIPAL
           ========================= */
        .main-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 84px);
        }

        /* =========================
           BARRA LATERAL IZQUIERDA
           ========================= */
        .sidebar {
            width: 290px;
            background-color: var(--color-2);
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            border-right: 2px solid var(--color-3);
            flex-shrink: 0;
        }

        .sidebar-header-box {
            padding: 4px 6px 12px;
            border-bottom: 2px solid var(--color-3);
        }

        .sidebar-header-box h2 {
            font-family: var(--font-title);
            font-size: 28px;
            color: var(--color-8);
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.1;
        }

        .sidebar-header-box span {
            font-size: 12px;
            color: var(--color-6);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .admin-tabs-nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 6px;
        }

        .tab-nav-btn {
            width: 100%;
            padding: 12px 14px;
            background-color: #fff;
            border: 2px solid var(--color-3);
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: var(--transition);
            text-align: left;
            box-shadow: 0 2px 6px rgba(23, 12, 2, 0.04);
        }

        .tab-nav-btn .tab-icon {
            font-size: 22px;
            width: 32px;
            height: 32px;
            background-color: var(--color-2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .tab-nav-btn .tab-text {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .tab-nav-btn .tab-text strong {
            font-size: 15px;
            color: var(--color-8);
            font-weight: 700;
        }

        .tab-nav-btn .tab-text small {
            font-size: 11.5px;
            color: var(--color-6);
        }

        .tab-nav-btn .tab-count {
            background-color: var(--color-2);
            color: var(--color-7);
            font-size: 11.5px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 12px;
            border: 1px solid var(--color-3);
        }

        .tab-nav-btn:hover {
            border-color: var(--color-4);
            transform: translateX(4px);
            background-color: var(--color-1);
        }

        .tab-nav-btn.active {
            background: linear-gradient(135deg, var(--color-7), var(--color-8));
            border-color: var(--color-8);
            box-shadow: 0 4px 14px rgba(88, 44, 9, 0.25);
            transform: translateX(5px);
        }

        .tab-nav-btn.active .tab-icon {
            background-color: rgba(253, 241, 232, 0.2);
        }

        .tab-nav-btn.active .tab-text strong {
            color: var(--color-1);
        }

        .tab-nav-btn.active .tab-text small {
            color: var(--color-3);
        }

        .tab-nav-btn.active .tab-count {
            background-color: var(--color-5);
            color: #fff;
            border-color: var(--color-4);
        }

        /* Metrics summary box */
        .sidebar-metrics {
            margin-top: auto;
            background-color: #fff;
            border: 1.5px solid var(--color-3);
            border-radius: 14px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 12.5px;
        }

        .sidebar-metrics strong {
            color: var(--color-7);
            font-size: 13px;
        }

        .metric-row {
            display: flex;
            justify-content: space-between;
            color: var(--color-8);
        }

        .metric-val {
            font-weight: 700;
            color: var(--color-6);
        }

        /* =========================
           CONTENIDO PRINCIPAL
           ========================= */
        .content {
            flex: 1;
            padding: 30px 32px 80px;
            background-color: var(--color-1);
            overflow-y: auto;
        }

        .admin-tab-pane {
            display: none;
            flex-direction: column;
            gap: 20px;
            animation: fadeInTab 0.3s ease-out;
        }

        .admin-tab-pane.active {
            display: flex;
        }

        @keyframes fadeInTab {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .admin-banner {
            background: linear-gradient(135deg, var(--color-2), var(--color-3));
            border-left: 6px solid var(--color-5);
            border-radius: 16px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-card);
            gap: 15px;
            flex-wrap: wrap;
        }

        .admin-banner h2 {
            font-family: var(--font-title);
            color: var(--color-7);
            font-size: 26px;
            margin-bottom: 3px;
        }

        .admin-banner p {
            color: var(--color-8);
            font-size: 13.5px;
        }

        /* =========================
           BOTÓN FLOTANTE (FAB)
           ========================= */
        .fab-add-dish {
            position: fixed;
            bottom: 32px;
            right: 32px;
            height: 60px;
            padding: 0 24px 0 18px;
            border-radius: 30px;
            background: linear-gradient(135deg, var(--color-5), var(--color-6));
            color: var(--color-1);
            border: 2px solid var(--color-3);
            box-shadow: 0 8px 25px rgba(181, 91, 18, 0.45);
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-family: var(--font-body);
            font-size: 15.5px;
            font-weight: 700;
        }

        .fab-add-dish .fab-icon {
            font-size: 26px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .fab-add-dish:hover {
            transform: translateY(-4px) scale(1.04);
            box-shadow: 0 12px 30px rgba(181, 91, 18, 0.6);
            background: linear-gradient(135deg, var(--color-4), var(--color-5));
        }

        /* GRID DE PLATILLOS */
        .dishes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 22px;
        }

        .dish-card {
            background-color: var(--color-2);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: var(--shadow-card);
            border: 1.5px solid var(--color-3);
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            position: relative;
        }

        .dish-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: var(--color-4);
        }

        .dish-img-container {
            position: relative;
            width: 100%;
            height: 175px;
            background-color: var(--color-3);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dish-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .dish-country-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background-color: rgba(23, 12, 2, 0.85);
            backdrop-filter: blur(4px);
            color: var(--color-1);
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-admin-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .btn-card-action {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
            transition: var(--transition);
        }

        .btn-edit-dish {
            background-color: var(--color-5);
            color: var(--color-1);
        }

        .btn-edit-dish:hover {
            background-color: var(--color-6);
            transform: scale(1.1);
        }

        .btn-delete-dish {
            background-color: #c53030;
            color: #fff;
        }

        .btn-delete-dish:hover {
            background-color: #9b2c2c;
            transform: scale(1.1);
        }

        .dish-content {
            padding: 18px 20px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .dish-location-tag {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            color: var(--color-6);
            margin-bottom: 6px;
            background: rgba(237, 145, 69, 0.12);
            padding: 4px 9px;
            border-radius: 8px;
            width: fit-content;
        }

        .dish-title {
            font-family: var(--font-title);
            font-size: 21px;
            color: var(--color-7);
            margin-bottom: 6px;
            line-height: 1.25;
            font-weight: 700;
        }

        .dish-description {
            font-size: 13.5px;
            color: var(--color-8);
            line-height: 1.5;
            margin-bottom: 16px;
            flex: 1;
        }

        .dish-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid var(--color-3);
        }

        .dish-price-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--color-6);
            display: block;
        }

        .dish-price {
            font-size: 19px;
            font-weight: 700;
            color: var(--color-7);
        }

        /* =========================
           TAB 2: PEDIDOS
           ========================= */
        .orders-main-grid {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .order-card-row {
            background-color: #fff;
            border: 1.5px solid var(--color-3);
            border-radius: 16px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            box-shadow: var(--shadow-card);
            transition: var(--transition);
        }

        .order-card-row:hover {
            border-color: var(--color-5);
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .order-row-main {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .order-header-line {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .order-header-line strong {
            font-size: 16px;
            color: var(--color-8);
        }

        .order-badge-pill {
            font-size: 12px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 12px;
        }

        .badge-status {
            background-color: var(--color-2);
            color: var(--color-7);
        }

        .badge-status.entregado {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .badge-status.camino {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .badge-status.preparacion {
            background-color: #e3f2fd;
            color: #1565c0;
        }

        .order-data-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 2px;
        }

        .data-pill {
            background-color: var(--color-1);
            border: 1px solid var(--color-3);
            padding: 3px 9px;
            border-radius: 8px;
            font-size: 12.5px;
            color: var(--color-7);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .order-row-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .order-total-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--color-7);
            text-align: right;
        }

        .select-order-status {
            padding: 7px 12px;
            border-radius: 10px;
            border: 1.5px solid var(--color-4);
            background-color: var(--color-1);
            color: var(--color-8);
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            transition: var(--transition);
        }

        .select-order-status:focus {
            border-color: var(--color-5);
            background-color: #fff;
        }

        /* =========================
           TAB 3: LOCALES
           ========================= */
        .locales-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .local-card {
            background-color: #fff;
            border: 1.5px solid var(--color-3);
            border-radius: 16px;
            padding: 20px;
            box-shadow: var(--shadow-card);
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: var(--transition);
            position: relative;
        }

        .local-card:hover {
            border-color: var(--color-5);
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .local-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .local-title {
            font-family: var(--font-title);
            font-size: 22px;
            color: var(--color-7);
            line-height: 1.15;
            font-weight: 700;
        }

        .local-city-badge {
            background-color: var(--color-2);
            color: var(--color-7);
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .local-detail-item {
            font-size: 13px;
            color: var(--color-8);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .local-footer {
            margin-top: auto;
            padding-top: 10px;
            border-top: 1px dashed var(--color-3);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-edit-local, .btn-delete-local {
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: var(--transition);
        }

        .btn-edit-local {
            background-color: var(--color-4);
            color: var(--color-10);
        }

        .btn-edit-local:hover {
            background-color: var(--color-5);
            color: #fff;
        }

        .btn-delete-local {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .btn-delete-local:hover {
            background-color: #ef4444;
            color: #fff;
        }

        /* =========================
           MODALES
           ========================= */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(23, 12, 2, 0.72);
            backdrop-filter: blur(5px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.28s ease;
        }

        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-box {
            background-color: var(--color-1);
            border: 2px solid var(--color-4);
            border-radius: 22px;
            width: 100%;
            max-width: 580px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 60px rgba(0,0,0,0.45);
            padding: 28px;
            transform: scale(0.94);
            transition: all 0.28s ease;
        }

        .modal-overlay.open .modal-box {
            transform: scale(1);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid var(--color-3);
            padding-bottom: 14px;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-family: var(--font-title);
            font-size: 26px;
            color: var(--color-7);
        }

        .btn-close-modal {
            background: none;
            border: none;
            font-size: 24px;
            color: var(--color-6);
            cursor: pointer;
            line-height: 1;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 14px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--color-7);
        }

        .form-group input, .form-group select, .form-group textarea {
            padding: 10px 14px;
            border-radius: 10px;
            border: 1.5px solid var(--color-3);
            background-color: #fff;
            color: var(--color-9);
            font-family: var(--font-body);
            font-size: 14px;
            outline: none;
            transition: var(--transition);
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--color-5);
            box-shadow: 0 0 0 3px rgba(237, 145, 69, 0.25);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 2px solid var(--color-3);
        }

        .btn-modal-cancel {
            background: none;
            border: 1.5px solid var(--color-6);
            color: var(--color-6);
            padding: 9px 18px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-modal-cancel:hover {
            background-color: rgba(181, 91, 18, 0.1);
        }

        .btn-modal-save {
            background-color: var(--color-7);
            color: var(--color-1);
            border: none;
            padding: 10px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(135, 68, 13, 0.3);
        }

        .btn-modal-save:hover {
            background-color: var(--color-6);
            transform: translateY(-2px);
        }

        /* Toast */
        .toast {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: var(--color-7);
            color: var(--color-1);
            padding: 14px 22px;
            border-radius: 14px;
            border-left: 5px solid var(--color-5);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            font-size: 14px;
            font-weight: 500;
            z-index: 3000;
            transform: translateY(40px);
            opacity: 0;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 950px) {
            .main-container { flex-direction: column; }
            .sidebar { width: 100%; border-right: none; border-bottom: 2px solid var(--color-3); padding: 18px 20px; }
            .header-center { max-width: 350px; }
        }

        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .fab-add-dish { bottom: 20px; right: 20px; padding: 0 16px; }
            .order-card-row { flex-direction: column; align-items: flex-start; }
            .order-row-actions { width: 100%; justify-content: space-between; }
        }
    </style>
</head>
<body>

    <!-- =========================
         HEADER
         ========================= -->
    <header class="header">
        <a href="/admin" class="logo">
            <img src="{{ asset('Otros/Logo 500x500 px.png') }}" alt="Logo El viejo hogar" onerror="this.onerror=null; this.src='{{ asset('Logo 500x500 px.jpeg') }}';">
            <span>El viejo hogar</span>
            <span class="badge-admin">Admin</span>
        </a>

        <!-- Buscador -->
        <div class="header-center">
            <div class="search-container">
                <input type="text" id="topSearchInput" placeholder="Buscar en platillos, pedidos o locales...">
                <button class="search-button" title="Buscar">🔍</button>
            </div>
        </div>

        <!-- Vista Cliente, Perfil, Salir -->
        <div class="header-right">
            <a href="/menu" class="btn-view-client" title="Ver catálogo como cliente">
                <span>👁️ Vista Cliente</span>
            </a>

            <div class="profile-badge">
                <div class="profile-avatar">👑</div>
                <span class="profile-name" id="adminNameDisplay">{{ $admin['nombre'] ?? 'Administrador' }}</span>
            </div>

            <a href="/logout" class="btn-logout" id="btnLogout" title="Cerrar sesión">Salir</a>
        </div>
    </header>

    <!-- =========================
         CONTENEDOR PRINCIPAL
         ========================= -->
    <div class="main-container">

        <!-- BARRA LATERAL IZQUIERDA -->
        <aside class="sidebar">
            <div class="sidebar-header-box">
                <h2>Configuración</h2>
                <span>Panel de Administración (SQLite)</span>
            </div>

            <!-- TABS DE NAVEGACIÓN -->
            <div class="admin-tabs-nav">
                <!-- Tab 1: Platillos -->
                <button class="tab-nav-btn active" data-tab="platillos" onclick="switchAdminTab('platillos')">
                    <span class="tab-icon">🍲</span>
                    <div class="tab-text">
                        <strong>Platillos</strong>
                        <small>Catálogo y edición</small>
                    </div>
                    <span class="tab-count" id="tabCountDishes">{{ $platillos->count() }}</span>
                </button>

                <!-- Tab 2: Pedidos -->
                <button class="tab-nav-btn" data-tab="pedidos" onclick="switchAdminTab('pedidos')">
                    <span class="tab-icon">📋</span>
                    <div class="tab-text">
                        <strong>Pedidos</strong>
                        <small>Lista de clientes</small>
                    </div>
                    <span class="tab-count" id="tabCountOrders">{{ $pedidos->count() }}</span>
                </button>

                <!-- Tab 3: Locales -->
                <button class="tab-nav-btn" data-tab="locales" onclick="switchAdminTab('locales')">
                    <span class="tab-icon">🏬</span>
                    <div class="tab-text">
                        <strong>Locales</strong>
                        <small>Sucursales y envíos</small>
                    </div>
                    <span class="tab-count" id="tabCountLocales">{{ $locales->count() }}</span>
                </button>
            </div>

            <!-- Métricas generales -->
            <div class="sidebar-metrics">
                <strong>📊 Resumen de Base de Datos:</strong>
                <div class="metric-row"><span>Total Platillos:</span><span class="metric-val" id="metricPlatillos">{{ $platillos->count() }}</span></div>
                <div class="metric-row"><span>Pedidos Recibidos:</span><span class="metric-val" id="metricPedidos">{{ $pedidos->count() }}</span></div>
                <div class="metric-row"><span>Locales / Sucursales:</span><span class="metric-val" id="metricLocales">{{ $locales->count() }}</span></div>
                <div class="metric-row"><span>Total Facturado:</span><span class="metric-val" id="metricFacturado">${{ number_format($pedidos->sum('total'), 0, ',', '.') }}</span></div>
            </div>
        </aside>

        <!-- ÁREA DE CONTENIDO A LA DERECHA -->
        <main class="content">

            <!-- TAB 1: PLATILLOS -->
            <div class="admin-tab-pane active" id="tabPanePlatillos">
                <div class="admin-banner">
                    <div>
                        <h2>Gestión de Platillos</h2>
                        <p>Edita precios, ingredientes, ciudad, local y calle. Conectado a la base de datos SQLite.</p>
                    </div>
                    <div style="font-size: 13px; color: var(--color-7); font-weight: 600;">
                        💡 Usa el botón flotante <strong>＋</strong> en la esquina inferior para agregar platillos.
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
                    <div class="catalog-stats" id="catalogStatsText">
                        Mostrando {{ $platillos->count() }} platillos registrados
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <select id="filterCountrySelect" style="padding: 8px 12px; border-radius: 10px; border: 1px solid var(--color-4); background-color: var(--color-2); font-family: var(--font-body); font-size: 13px; color: var(--color-8);">
                            <option value="all">🌐 Todos los países</option>
                            <option value="Argentina">🇦🇷 Argentina</option>
                            <option value="España">🇪🇸 España</option>
                            <option value="México">🇲🇽 México</option>
                            <option value="China">🇨🇳 China</option>
                            <option value="Italia">🇮🇹 Italia</option>
                        </select>

                        <select id="sortDishesSelect" style="padding: 8px 12px; border-radius: 10px; border: 1px solid var(--color-4); background-color: var(--color-2); font-family: var(--font-body); font-size: 13px; color: var(--color-8);">
                            <option value="default">Orden por defecto</option>
                            <option value="price-asc">Precio: Menor a Mayor</option>
                            <option value="price-desc">Precio: Mayor a Menor</option>
                            <option value="name-asc">Nombre (A - Z)</option>
                        </select>
                    </div>
                </div>

                <!-- Grid de platillos -->
                <div class="dishes-grid" id="dishesGrid"></div>

                <!-- FAB AGREGAR PLATILLO -->
                <button class="fab-add-dish" id="btnOpenAddModal" onclick="openAddModal()" title="Agregar nuevo platillo a la base de datos">
                    <span class="fab-icon">＋</span>
                    <span>Agregar Platillo</span>
                </button>
            </div>

            <!-- TAB 2: PEDIDOS -->
            <div class="admin-tab-pane" id="tabPanePedidos">
                <div class="admin-banner">
                    <div>
                        <h2>Pedidos Recibidos</h2>
                        <p>Supervisa en vivo los pedidos realizados por los clientes y actualiza su estado de entrega en la BD SQLite.</p>
                    </div>
                </div>

                <div class="orders-main-grid" id="ordersMainList"></div>
            </div>

            <!-- TAB 3: LOCALES -->
            <div class="admin-tab-pane" id="tabPaneLocales">
                <div class="admin-banner">
                    <div>
                        <h2>Locales y Sucursales</h2>
                        <p>Administra las sucursales oficiales, teléfonos de contacto, costos de envío y medios de pago admitidos.</p>
                    </div>
                    <button class="btn-view-client" onclick="openAddLocalModal()" style="border:none; cursor:pointer;">
                        <span>＋ Agregar Sucursal</span>
                    </button>
                </div>

                <div class="locales-grid" id="localesGrid"></div>
            </div>

        </main>
    </div>

    <!-- MODAL AGREGAR / EDITAR PLATILLO -->
    <div class="modal-overlay" id="dishModal">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="modalDishTitle">Agregar Nuevo Platillo</h3>
                <button type="button" class="btn-close-modal" id="btnCloseDishModal" onclick="closeDishModal()">&times;</button>
            </div>

            <form id="dishForm">
                <input type="hidden" id="dishIdInput">
                
                <div class="form-grid">
                    <div class="form-group full">
                        <label for="dishNameInput">Nombre del platillo *</label>
                        <input type="text" id="dishNameInput" required placeholder="Ej: Pollo a la leña">
                    </div>

                    <div class="form-group">
                        <label for="dishCountrySelect">País de origen *</label>
                        <select id="dishCountrySelect" required>
                            <option value="Argentina">🇦🇷 Argentina</option>
                            <option value="España">🇪🇸 España</option>
                            <option value="México">🇲🇽 México</option>
                            <option value="China">🇨🇳 China</option>
                            <option value="Italia">🇮🇹 Italia</option>
                            <option value="Otro">🌐 Otro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dishPriceInput">Precio ($ ARS) *</label>
                        <input type="number" id="dishPriceInput" required min="100" step="50" placeholder="Ej: 9500">
                    </div>

                    <div class="form-group">
                        <label for="dishCityInput">Ciudad donde se ofrece *</label>
                        <input type="text" id="dishCityInput" required placeholder="Ej: Córdoba">
                    </div>

                    <div class="form-group">
                        <label for="dishLocalInput">Sucursal / Local *</label>
                        <input type="text" id="dishLocalInput" required placeholder="Ej: Sucursal Centro">
                    </div>

                    <div class="form-group full">
                        <label for="dishCalleInput">Dirección de la sucursal *</label>
                        <input type="text" id="dishCalleInput" required placeholder="Ej: Av. Colón 1230">
                    </div>

                    <div class="form-group full">
                        <label for="dishDescInput">Descripción de ingredientes y sabor *</label>
                        <textarea id="dishDescInput" rows="3" required placeholder="Describe brevemente el platillo..."></textarea>
                    </div>

                    <div class="form-group full">
                        <label for="dishImageInput">Ruta o URL de Imagen (Opcional)</label>
                        <input type="text" id="dishImageInput" placeholder="Ej: Otros/20200731162901pollo-asado.jpg">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" onclick="closeDishModal()">Cancelar</button>
                    <button type="submit" class="btn-modal-save" id="btnSaveDish">Guardar en Base de Datos</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL AGREGAR / EDITAR LOCAL -->
    <div class="modal-overlay" id="localModal">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="modalLocalTitle">Agregar Sucursal</h3>
                <button type="button" class="btn-close-modal" onclick="closeLocalModal()">&times;</button>
            </div>

            <form id="localForm">
                <input type="hidden" id="localIdInput">
                
                <div class="form-grid">
                    <div class="form-group full">
                        <label for="localNameInput">Nombre de la sucursal *</label>
                        <input type="text" id="localNameInput" required placeholder="Ej: Sucursal Alberdi">
                    </div>

                    <div class="form-group">
                        <label for="localCityInput">Ciudad *</label>
                        <input type="text" id="localCityInput" required placeholder="Ej: Córdoba">
                    </div>

                    <div class="form-group">
                        <label for="localPhoneInput">Teléfono de contacto *</label>
                        <input type="text" id="localPhoneInput" required placeholder="Ej: +54 351 456-7890">
                    </div>

                    <div class="form-group full">
                        <label for="localCalleInput">Calle y número *</label>
                        <input type="text" id="localCalleInput" required placeholder="Ej: Av. Colón 2400">
                    </div>

                    <div class="form-group">
                        <label for="localShippingInput">Costo de envío ($ ARS) *</label>
                        <input type="number" id="localShippingInput" required min="0" step="50" placeholder="Ej: 1200">
                    </div>

                    <div class="form-group full">
                        <label for="localPaymentInput">Medios de pago admitidos *</label>
                        <input type="text" id="localPaymentInput" required placeholder="Ej: Visa, Mastercard, Mercado Pago, Efectivo">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" onclick="closeLocalModal()">Cancelar</button>
                    <button type="submit" class="btn-modal-save" id="btnSaveLocal">Guardar Sucursal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toastBox">✓ Notificación</div>

    <!-- JAVASCRIPT & SQLite SYNC -->
    <script>
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Datos iniciales inyectados directamente desde SQLite
        let dishesList = @json($platillos->values());
        let ordersList = @json($pedidos->values());
        let localesList = @json($locales->values());

        let activeTab = 'platillos';
        let searchQuery = '';
        let activeCountryFilter = 'all';
        let currentSort = 'default';

        function showToast(msg) {
            const toast = document.getElementById('toastBox');
            toast.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }

        // TABS
        function switchAdminTab(tabName) {
            activeTab = tabName;
            document.querySelectorAll('.tab-nav-btn').forEach(btn => {
                btn.classList.toggle('active', btn.getAttribute('data-tab') === tabName);
            });
            document.getElementById('tabPanePlatillos').classList.toggle('active', tabName === 'platillos');
            document.getElementById('tabPanePedidos').classList.toggle('active', tabName === 'pedidos');
            document.getElementById('tabPaneLocales').classList.toggle('active', tabName === 'locales');
            
            // Ocultar FAB si no es platillos
            const fab = document.getElementById('btnOpenAddModal');
            if (fab) fab.style.display = (tabName === 'platillos') ? 'flex' : 'none';

            if (tabName === 'platillos') renderDishes();
            else if (tabName === 'pedidos') renderOrders();
            else if (tabName === 'locales') renderLocales();
        }

        // RENDER PLATILLOS
        function renderDishes() {
            let list = [...dishesList];

            if (activeCountryFilter !== 'all') {
                list = list.filter(d => d.pais && d.pais.toLowerCase() === activeCountryFilter.toLowerCase());
            }

            if (searchQuery.trim() !== '') {
                const q = searchQuery.toLowerCase().trim();
                list = list.filter(d => 
                    (d.nombre && d.nombre.toLowerCase().includes(q)) ||
                    (d.descripcion && d.descripcion.toLowerCase().includes(q)) ||
                    (d.ciudad && d.ciudad.toLowerCase().includes(q)) ||
                    (d.local && d.local.toLowerCase().includes(q))
                );
            }

            if (currentSort === 'price-asc') list.sort((a,b) => a.precio - b.precio);
            else if (currentSort === 'price-desc') list.sort((a,b) => b.precio - a.precio);
            else if (currentSort === 'name-asc') list.sort((a,b) => a.nombre.localeCompare(b.nombre));

            document.getElementById('tabCountDishes').textContent = dishesList.length;
            document.getElementById('metricPlatillos').textContent = dishesList.length;
            document.getElementById('catalogStatsText').textContent = `Mostrando ${list.length} de ${dishesList.length} platillos en SQLite`;

            const grid = document.getElementById('dishesGrid');
            if (list.length === 0) {
                grid.innerHTML = `<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--color-7);">No se encontraron platillos con los filtros aplicados.</div>`;
                return;
            }

            grid.innerHTML = list.map(dish => {
                const imgSrc = dish.imagen ? `/${dish.imagen}` : '/Otros/20200731162901pollo-asado.jpg';
                return `
                <article class="dish-card" data-id="${dish.id}">
                    <div class="card-admin-actions">
                        <button class="btn-card-action btn-edit-dish" onclick="openEditDishModal(${dish.id})" title="Editar platillo">✏️</button>
                        <button class="btn-card-action btn-delete-dish" onclick="deleteDish(${dish.id})" title="Eliminar platillo">🗑️</button>
                    </div>
                    <div class="dish-img-container">
                        <img src="${imgSrc}" alt="${dish.nombre}" onerror="this.onerror=null; this.src='/Otros/20200731162901pollo-asado.jpg';">
                        <div class="dish-country-badge">
                            <span>${dish.bandera || '🍽️'}</span>
                            <span>${dish.pais}</span>
                        </div>
                    </div>
                    <div class="dish-content">
                        <div class="dish-location-tag">
                            <span>📍</span>
                            <span>${dish.local || 'Sucursal Centro'} (${dish.ciudad || 'Córdoba'})</span>
                        </div>
                        <h3 class="dish-title">${dish.nombre}</h3>
                        <p class="dish-description">${dish.descripcion || ''}</p>
                        <div class="dish-footer">
                            <div>
                                <span class="dish-price-label">Precio</span>
                                <div class="dish-price">$ ${Number(dish.precio).toLocaleString('es-AR')} <span>ARS</span></div>
                            </div>
                        </div>
                    </div>
                </article>`;
            }).join('');
        }

        // RENDER PEDIDOS
        function renderOrders() {
            document.getElementById('tabCountOrders').textContent = ordersList.length;
            document.getElementById('metricPedidos').textContent = ordersList.length;

            const totalFacturado = ordersList.reduce((acc, o) => acc + Number(o.total || 0), 0);
            document.getElementById('metricFacturado').textContent = `$${totalFacturado.toLocaleString('es-AR')}`;

            const container = document.getElementById('ordersMainList');
            if (ordersList.length === 0) {
                container.innerHTML = `<div style="text-align: center; padding: 40px; color: var(--color-7);">No hay pedidos registrados en la base de datos.</div>`;
                return;
            }

            container.innerHTML = ordersList.map(order => {
                let statusClass = 'preparacion';
                if (order.estado === 'En camino') statusClass = 'camino';
                if (order.estado === 'Entregado') statusClass = 'entregado';

                let itemsHtml = '';
                if (Array.isArray(order.items)) {
                    itemsHtml = order.items.map(it => `${it.nombre} x${it.cantidad || 1}`).join(', ');
                } else if (typeof order.items === 'string') {
                    try {
                        const parsed = JSON.parse(order.items);
                        itemsHtml = Array.isArray(parsed) ? parsed.map(it => `${it.nombre} x${it.cantidad || 1}`).join(', ') : order.items;
                    } catch(e) { itemsHtml = order.items; }
                }

                return `
                <div class="order-card-row" data-id="${order.id}">
                    <div class="order-row-main">
                        <div class="order-header-line">
                            <strong>${order.codigo}</strong>
                            <span class="order-badge-pill badge-status ${statusClass}">${order.estado}</span>
                            <span style="font-size: 13px; color: var(--color-6);">${order.created_at ? new Date(order.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) : ''}</span>
                        </div>
                        <div style="font-size: 14.5px; font-weight: 600; color: var(--color-9);">
                            👤 ${order.cliente_nombre} ${order.cliente_email ? '(' + order.cliente_email + ')' : ''}
                        </div>
                        <div class="order-data-pills">
                            <span class="data-pill">📍 ${order.ciudad_entrega}, ${order.direccion_entrega}</span>
                            <span class="data-pill">💳 ${order.metodo_pago} ${order.billetera ? '• ' + order.billetera : ''}</span>
                            <span class="data-pill">🍲 ${itemsHtml || 'Items del menú'}</span>
                        </div>
                    </div>
                    <div class="order-row-actions">
                        <div>
                            <div class="order-total-price">$ ${Number(order.total).toLocaleString('es-AR')}</div>
                            <small style="color: var(--color-6); display: block; text-align: right;">Total final</small>
                        </div>
                        <select class="select-order-status" onchange="updateOrderStatus(${order.id}, this.value)">
                            <option value="En preparación" ${order.estado === 'En preparación' ? 'selected' : ''}>⏳ En preparación</option>
                            <option value="En camino" ${order.estado === 'En camino' ? 'selected' : ''}>🛵 En camino</option>
                            <option value="Entregado" ${order.estado === 'Entregado' ? 'selected' : ''}>✓ Entregado</option>
                        </select>
                    </div>
                </div>`;
            }).join('');
        }

        // RENDER LOCALES
        function renderLocales() {
            document.getElementById('tabCountLocales').textContent = localesList.length;
            document.getElementById('metricLocales').textContent = localesList.length;

            const grid = document.getElementById('localesGrid');
            if (localesList.length === 0) {
                grid.innerHTML = `<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--color-7);">No hay locales registrados en la base de datos.</div>`;
                return;
            }

            grid.innerHTML = localesList.map(local => `
                <div class="local-card" data-id="${local.id}">
                    <div class="local-header">
                        <h4 class="local-title">${local.nombre}</h4>
                        <span class="local-city-badge">🏙️ ${local.ciudad}</span>
                    </div>
                    <div class="local-detail-item">
                        <span>📍</span>
                        <span>${local.calle}</span>
                    </div>
                    <div class="local-detail-item">
                        <span>📞</span>
                        <span>${local.telefono}</span>
                    </div>
                    <div class="local-detail-item">
                        <span>🛵</span>
                        <span>Envío: <strong>$ ${Number(local.costo_envio).toLocaleString('es-AR')}</strong></span>
                    </div>
                    <div class="local-detail-item">
                        <span>💳</span>
                        <span style="font-size: 11.5px;">${local.medios_pago}</span>
                    </div>
                    <div class="local-footer">
                        <button class="btn-edit-local" onclick="openEditLocalModal(${local.id})">✏️ Editar</button>
                        <button class="btn-delete-local" onclick="deleteLocal(${local.id})">🗑️ Eliminar</button>
                    </div>
                </div>
            `).join('');
        }

        // CRUD PLATILLOS (AJAX -> SQLite)
        function openAddModal() {
            document.getElementById('modalDishTitle').textContent = "Agregar Nuevo Platillo";
            document.getElementById('dishIdInput').value = "";
            document.getElementById('dishNameInput').value = "";
            document.getElementById('dishCountrySelect').value = "Argentina";
            document.getElementById('dishPriceInput').value = "";
            document.getElementById('dishCityInput').value = "Córdoba";
            document.getElementById('dishLocalInput').value = "Sucursal Centro";
            document.getElementById('dishCalleInput').value = "Av. Colón 1230";
            document.getElementById('dishDescInput').value = "";
            document.getElementById('dishImageInput').value = "";
            document.getElementById('dishModal').classList.add('open');
        }

        function openEditDishModal(id) {
            const dish = dishesList.find(d => d.id === id);
            if (!dish) return;

            document.getElementById('modalDishTitle').textContent = "Editar Platillo";
            document.getElementById('dishIdInput').value = dish.id;
            document.getElementById('dishNameInput').value = dish.nombre;
            document.getElementById('dishCountrySelect').value = dish.pais || "Argentina";
            document.getElementById('dishPriceInput').value = dish.precio;
            document.getElementById('dishCityInput').value = dish.ciudad || "Córdoba";
            document.getElementById('dishLocalInput').value = dish.local || "Sucursal Centro";
            document.getElementById('dishCalleInput').value = dish.calle || "Av. Colón 1230";
            document.getElementById('dishDescInput').value = dish.descripcion || "";
            document.getElementById('dishImageInput').value = dish.imagen || "";
            document.getElementById('dishModal').classList.add('open');
        }

        function closeDishModal() {
            document.getElementById('dishModal').classList.remove('open');
        }

        document.getElementById('dishForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const id = document.getElementById('dishIdInput').value;
            const payload = {
                nombre: document.getElementById('dishNameInput').value.trim(),
                pais: document.getElementById('dishCountrySelect').value,
                precio: Number(document.getElementById('dishPriceInput').value),
                ciudad: document.getElementById('dishCityInput').value.trim(),
                local: document.getElementById('dishLocalInput').value.trim(),
                calle: document.getElementById('dishCalleInput').value.trim(),
                descripcion: document.getElementById('dishDescInput').value.trim(),
                imagen: document.getElementById('dishImageInput').value.trim()
            };

            const url = id ? `/admin/platillos/${id}` : '/admin/platillos';
            const method = id ? 'PUT' : 'POST';

            try {
                const res = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    showToast(id ? '✓ Platillo actualizado en SQLite' : '✓ Platillo guardado en SQLite');
                    closeDishModal();
                    // Refrescar lista de platillos desde API
                    const refreshRes = await fetch('/admin/platillos');
                    dishesList = await refreshRes.json();
                    renderDishes();
                } else {
                    alert('Error al guardar platillo');
                }
            } catch(err) {
                console.error(err);
                alert('Error de conexión con el servidor.');
            }
        });

        async function deleteDish(id) {
            const dish = dishesList.find(d => d.id === id);
            if (!dish) return;
            if (!confirm(`¿Eliminar "${dish.nombre}" de la base de datos?`)) return;

            try {
                const res = await fetch(`/admin/platillos/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': CSRF_TOKEN, 'Accept': 'application/json' }
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`✓ Platillo "${dish.nombre}" eliminado`);
                    dishesList = dishesList.filter(d => d.id !== id);
                    renderDishes();
                }
            } catch(e) {
                console.error(e);
                alert('Error al eliminar');
            }
        }

        // PEDIDOS: ACTUALIZAR ESTADO (AJAX -> SQLite)
        async function updateOrderStatus(id, newStatus) {
            try {
                const res = await fetch(`/admin/pedidos/${id}/estado`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ estado: newStatus })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`✓ Pedido actualizado a "${newStatus}" en SQLite`);
                    const p = ordersList.find(o => o.id === id);
                    if (p) p.estado = newStatus;
                    renderOrders();
                }
            } catch(e) {
                console.error(e);
                alert('Error al actualizar pedido');
            }
        }

        // CRUD LOCALES (AJAX -> SQLite)
        function openAddLocalModal() {
            document.getElementById('modalLocalTitle').textContent = "Agregar Sucursal";
            document.getElementById('localIdInput').value = "";
            document.getElementById('localNameInput').value = "";
            document.getElementById('localCityInput').value = "Córdoba";
            document.getElementById('localPhoneInput').value = "+54 351 ";
            document.getElementById('localCalleInput').value = "";
            document.getElementById('localShippingInput').value = "1200";
            document.getElementById('localPaymentInput').value = "Visa, Mastercard, Mercado Pago, Efectivo";
            document.getElementById('localModal').classList.add('open');
        }

        function openEditLocalModal(id) {
            const local = localesList.find(l => l.id === id);
            if (!local) return;

            document.getElementById('modalLocalTitle').textContent = "Editar Sucursal";
            document.getElementById('localIdInput').value = local.id;
            document.getElementById('localNameInput').value = local.nombre;
            document.getElementById('localCityInput').value = local.ciudad;
            document.getElementById('localPhoneInput').value = local.telefono;
            document.getElementById('localCalleInput').value = local.calle;
            document.getElementById('localShippingInput').value = local.costo_envio;
            document.getElementById('localPaymentInput').value = local.medios_pago;
            document.getElementById('localModal').classList.add('open');
        }

        function closeLocalModal() {
            document.getElementById('localModal').classList.remove('open');
        }

        document.getElementById('localForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const id = document.getElementById('localIdInput').value;
            const payload = {
                nombre: document.getElementById('localNameInput').value.trim(),
                ciudad: document.getElementById('localCityInput').value.trim(),
                calle: document.getElementById('localCalleInput').value.trim(),
                telefono: document.getElementById('localPhoneInput').value.trim(),
                costo_envio: Number(document.getElementById('localShippingInput').value),
                medios_pago: document.getElementById('localPaymentInput').value.trim()
            };

            const url = id ? `/admin/locales/${id}` : '/admin/locales';
            const method = id ? 'PUT' : 'POST';

            try {
                const res = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    showToast(id ? '✓ Sucursal actualizada' : '✓ Sucursal guardada en SQLite');
                    closeLocalModal();
                    const refreshRes = await fetch('/admin/locales');
                    localesList = await refreshRes.json();
                    renderLocales();
                }
            } catch(err) {
                console.error(err);
                alert('Error al guardar sucursal');
            }
        });

        async function deleteLocal(id) {
            const local = localesList.find(l => l.id === id);
            if (!local) return;
            if (!confirm(`¿Eliminar la sucursal "${local.nombre}" de la base de datos?`)) return;

            try {
                const res = await fetch(`/admin/locales/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': CSRF_TOKEN, 'Accept': 'application/json' }
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`✓ Sucursal eliminada`);
                    localesList = localesList.filter(l => l.id !== id);
                    renderLocales();
                }
            } catch(e) {
                console.error(e);
                alert('Error al eliminar sucursal');
            }
        }

        // EVENTOS DE BÚSQUEDA Y FILTRO
        document.getElementById('topSearchInput').addEventListener('input', (e) => {
            searchQuery = e.target.value;
            if (activeTab === 'platillos') renderDishes();
            else if (activeTab === 'pedidos') renderOrders();
            else if (activeTab === 'locales') renderLocales();
        });

        document.getElementById('filterCountrySelect').addEventListener('change', (e) => {
            activeCountryFilter = e.target.value;
            renderDishes();
        });

        document.getElementById('sortDishesSelect').addEventListener('change', (e) => {
            currentSort = e.target.value;
            renderDishes();
        });

        // INICIALIZACIÓN
        renderDishes();
        renderOrders();
        renderLocales();
    </script>
</body>
</html>
