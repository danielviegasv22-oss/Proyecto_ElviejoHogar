<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menú de Platillos | El Viejo Hogar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--color-1:#fdf1e8;--color-2:#fae3d1;--color-3:#f6c8a2;--color-4:#f1ac74;--color-5:#ed9145;--color-6:#b55b12;--color-7:#87440d;--color-8:#582c09;--color-9:#2a1504;--color-10:#170c02;--font-title:'Cormorant Garamond',Georgia,serif;--font-body:'Outfit',Arial,Helvetica,sans-serif;--shadow-card:0 6px 18px rgba(23,12,2,0.08);--shadow-card-hover:0 14px 28px rgba(88,44,9,0.16);--shadow-header:0 4px 18px rgba(23,12,2,0.22);--transition:all 0.3s cubic-bezier(0.25,0.8,0.25,1);}
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:var(--font-body);background-color:var(--color-1);color:var(--color-10);min-height:100vh;display:flex;flex-direction:column;overflow-x:hidden;background-image:radial-gradient(circle at 10% 20%,rgba(246,200,162,0.35) 0%,transparent 35%),radial-gradient(circle at 90% 80%,rgba(241,172,116,0.25) 0%,transparent 40%);background-attachment:fixed;}
        .header{width:100%;min-height:85px;background-color:var(--color-7);display:flex;align-items:center;justify-content:space-between;padding:10px 30px;box-shadow:var(--shadow-header);position:sticky;top:0;z-index:1000;gap:15px;}
        .logo-container{display:flex;align-items:center;gap:12px;text-decoration:none;cursor:pointer;flex-shrink:0;}
        .logo-img-wrapper{width:50px;height:50px;border-radius:50%;background-color:var(--color-2);border:2px solid var(--color-4);overflow:hidden;display:flex;align-items:center;justify-content:center;box-shadow:0 3px 8px rgba(0,0,0,0.2);}
        .logo-img-wrapper img{width:100%;height:100%;object-fit:cover;}
        .logo-text{display:flex;flex-direction:column;}
        .logo-text h1{font-family:var(--font-title);color:var(--color-1);font-size:24px;font-weight:700;line-height:1.1;letter-spacing:0.5px;}
        .logo-text span{color:var(--color-3);font-size:11px;font-weight:400;letter-spacing:1px;text-transform:uppercase;}
        .header-search-filter-section{display:flex;align-items:center;gap:10px;flex:1;max-width:620px;position:relative;}
        .header-search-bar{flex:1;position:relative;display:flex;align-items:center;background-color:var(--color-1);border:2px solid var(--color-4);border-radius:25px;padding:0 14px;height:44px;box-shadow:inset 0 2px 4px rgba(0,0,0,0.06);transition:var(--transition);}
        .header-search-bar:focus-within{border-color:var(--color-5);background-color:#fff;box-shadow:0 0 0 3px rgba(237,145,69,0.3);}
        .header-search-bar input{width:100%;border:none;outline:none;background:transparent;font-family:var(--font-body);font-size:14px;color:var(--color-9);padding-right:6px;}
        .header-search-bar input::placeholder{color:var(--color-6);opacity:0.75;}
        .header-search-icon{font-size:16px;color:var(--color-7);user-select:none;}
        .btn-clear-search{background:none;border:none;color:var(--color-6);cursor:pointer;font-size:14px;display:none;padding:2px 6px;}
        .btn-header-filters{display:flex;align-items:center;gap:8px;background-color:var(--color-5);color:var(--color-1);border:2px solid var(--color-4);padding:0 16px;height:44px;border-radius:25px;font-family:var(--font-body);font-size:14px;font-weight:600;cursor:pointer;transition:var(--transition);white-space:nowrap;box-shadow:0 3px 8px rgba(0,0,0,0.15);}
        .btn-header-filters:hover{background-color:var(--color-6);transform:translateY(-1px);}
        .filters-count-badge{background-color:var(--color-1);color:var(--color-8);font-size:11px;font-weight:700;padding:1px 7px;border-radius:10px;}
        .header-filters-wrapper{position:relative;}
        .filters-dropdown-menu{position:absolute;top:54px;left:50%;transform:translateX(-50%) translateY(10px);width:640px;max-width:92vw;background-color:var(--color-1);border:2px solid var(--color-4);border-radius:20px;box-shadow:0 18px 45px rgba(23,12,2,0.35);padding:22px;z-index:1100;opacity:0;visibility:hidden;transition:all 0.28s cubic-bezier(0.25,0.8,0.25,1);}
        .filters-dropdown-menu.open{opacity:1;visibility:visible;transform:translateX(-50%) translateY(0);}
        .filters-dropdown-header{display:flex;align-items:center;justify-content:space-between;border-bottom:2px solid var(--color-2);padding-bottom:12px;margin-bottom:18px;}
        .filters-dropdown-header h4{font-family:var(--font-title);font-size:22px;color:var(--color-8);display:flex;align-items:center;gap:8px;}
        .btn-close-dropdown{background:none;border:none;font-size:18px;color:var(--color-7);cursor:pointer;padding:4px;}
        .filters-two-parts-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
        .filter-part-1,.filter-part-2{background-color:var(--color-2);border-radius:14px;padding:16px;border:1.5px solid var(--color-3);display:flex;flex-direction:column;gap:14px;}
        .filter-part-title{font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.6px;color:var(--color-7);display:flex;align-items:center;gap:6px;border-bottom:1px dashed var(--color-4);padding-bottom:6px;}
        .nearby-toggle-card{background-color:#fff;border:2px solid var(--color-4);border-radius:12px;padding:12px;cursor:pointer;transition:var(--transition);display:flex;align-items:center;justify-content:space-between;gap:10px;}
        .nearby-toggle-card:hover{border-color:var(--color-5);box-shadow:0 3px 8px rgba(237,145,69,0.15);}
        .nearby-toggle-card.active{background-color:#f1f8e9;border-color:#2e7d32;}
        .nearby-text-group{display:flex;flex-direction:column;gap:2px;}
        .nearby-text-title{font-size:13.5px;font-weight:700;color:var(--color-9);display:flex;align-items:center;gap:6px;}
        .nearby-text-desc{font-size:11.5px;color:var(--color-6);}
        .nearby-checkbox{width:20px;height:20px;cursor:pointer;accent-color:var(--color-5);}
        .filter-field-group{display:flex;flex-direction:column;gap:5px;}
        .filter-field-label{font-size:12px;font-weight:600;color:var(--color-7);}
        .filter-select{width:100%;padding:9px 12px;border:1.5px solid var(--color-3);border-radius:10px;background-color:#fff;color:var(--color-9);font-family:var(--font-body);font-size:13px;outline:none;cursor:pointer;transition:var(--transition);}
        .filter-select:focus{border-color:var(--color-5);box-shadow:0 0 0 2px rgba(237,145,69,0.2);}
        .country-chips-grid{display:flex;flex-wrap:wrap;gap:6px;}
        .country-chip{padding:6px 12px;background-color:#fff;border:1.5px solid var(--color-3);border-radius:16px;font-size:12.5px;font-weight:600;color:var(--color-8);cursor:pointer;transition:var(--transition);display:flex;align-items:center;gap:5px;}
        .country-chip:hover{border-color:var(--color-4);background-color:var(--color-1);}
        .country-chip.active{background-color:var(--color-5);border-color:var(--color-6);color:var(--color-1);}
        .filters-dropdown-footer{margin-top:18px;padding-top:14px;border-top:2px solid var(--color-2);display:flex;align-items:center;justify-content:space-between;gap:10px;}
        .btn-reset-dropdown{background:none;border:1px dashed var(--color-6);color:var(--color-6);padding:8px 14px;border-radius:14px;font-size:12.5px;font-weight:600;cursor:pointer;transition:var(--transition);}
        .btn-reset-dropdown:hover{background-color:rgba(181,91,18,0.1);color:var(--color-7);}
        .btn-apply-dropdown{background-color:var(--color-6);color:var(--color-1);border:none;padding:9px 20px;border-radius:14px;font-size:13.5px;font-weight:700;cursor:pointer;transition:var(--transition);box-shadow:0 3px 10px rgba(181,91,18,0.3);}
        .btn-apply-dropdown:hover{background-color:var(--color-7);transform:translateY(-1px);}
        .header-actions{display:flex;align-items:center;gap:14px;flex-shrink:0;}
        .client-location-pill{display:flex;align-items:center;gap:7px;padding:6px 14px;background-color:rgba(253,241,232,0.15);border:1.5px solid var(--color-4);border-radius:20px;color:var(--color-1);font-size:13px;cursor:pointer;transition:var(--transition);}
        .client-location-pill:hover{background-color:rgba(253,241,232,0.25);border-color:var(--color-3);transform:translateY(-1px);}
        .client-location-pill .loc-city{font-weight:700;color:var(--color-2);}
        .client-location-pill .btn-edit-loc{background-color:var(--color-5);color:#fff;padding:2px 7px;border-radius:10px;font-size:11px;font-weight:600;margin-left:3px;}
        .btn-cart{position:relative;width:44px;height:44px;border-radius:50%;background-color:var(--color-5);border:2px solid var(--color-4);color:var(--color-1);display:flex;align-items:center;justify-content:center;font-size:20px;cursor:pointer;transition:var(--transition);box-shadow:0 4px 10px rgba(0,0,0,0.15);}
        .btn-cart:hover{background-color:var(--color-6);transform:scale(1.06);}
        .cart-badge{position:absolute;top:-5px;right:-5px;background-color:#d32f2f;color:white;font-size:11px;font-weight:700;width:22px;height:22px;border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid var(--color-1);box-shadow:0 2px 5px rgba(0,0,0,0.25);transition:transform 0.2s cubic-bezier(0.175,0.885,0.32,1.275);}
        .cart-badge.bump{transform:scale(1.35);}
        .user-profile{display:flex;align-items:center;gap:10px;padding:4px 12px 4px 6px;background-color:rgba(253,241,232,0.12);border-radius:25px;border:1px solid rgba(246,200,162,0.3);transition:var(--transition);}
        .user-avatar{width:34px;height:34px;border-radius:50%;background-color:var(--color-4);border:2px solid var(--color-1);overflow:hidden;display:flex;align-items:center;justify-content:center;font-size:16px;color:var(--color-8);}
        .user-info{display:flex;flex-direction:column;text-align:left;}
        .user-info .user-name{color:var(--color-1);font-size:13.5px;font-weight:600;white-space:nowrap;}
        .btn-admin-link{display:inline-flex;align-items:center;gap:5px;padding:6px 12px;background-color:var(--color-5);color:var(--color-1);text-decoration:none;border-radius:20px;font-size:12.5px;font-weight:600;transition:var(--transition);box-shadow:0 2px 8px rgba(0,0,0,0.2);white-space:nowrap;}
        .btn-admin-link:hover{background-color:var(--color-4);transform:translateY(-1px);}
        .btn-logout-client{background:none;border:1px solid var(--color-4);color:var(--color-2);padding:4px 9px;border-radius:12px;font-size:11.5px;font-family:var(--font-body);font-weight:600;cursor:pointer;transition:var(--transition);margin-left:4px;text-decoration:none;display:inline-block;}
        .btn-logout-client:hover{background-color:rgba(255,255,255,0.15);color:#fff;}
        .main-container{display:flex;flex:1;min-height:calc(100vh - 85px);position:relative;}
        .sidebar{width:280px;background-color:var(--color-2);padding:25px 20px;display:flex;flex-direction:column;gap:20px;border-right:2px solid var(--color-3);flex-shrink:0;box-shadow:2px 0 10px rgba(23,12,2,0.05);}
        .sidebar-card{background-color:#fff;border:1.5px solid var(--color-3);border-radius:16px;padding:16px;box-shadow:0 2px 8px rgba(23,12,2,0.04);display:flex;flex-direction:column;gap:10px;}
        .sidebar-card-title{font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:0.8px;color:var(--color-7);display:flex;align-items:center;gap:7px;}
        .sidebar-user-city-box{display:flex;align-items:center;justify-content:space-between;background-color:var(--color-1);border:1px solid var(--color-4);border-radius:10px;padding:10px 12px;}
        .sidebar-btn-modify-city{background-color:var(--color-5);color:var(--color-1);border:none;padding:4px 10px;border-radius:12px;font-size:11.5px;font-weight:600;cursor:pointer;transition:var(--transition);}
        .sidebar-btn-modify-city:hover{background-color:var(--color-6);}
        .branch-item{font-size:12.5px;border-left:3px solid var(--color-5);padding-left:8px;margin-bottom:6px;}
        .branch-item strong{color:var(--color-8);display:block;}
        .branch-item span{color:var(--color-6);font-size:11.5px;}
        .sidebar-promo{margin-top:auto;background:linear-gradient(135deg,var(--color-4),var(--color-5));border-radius:14px;padding:18px;color:var(--color-1);box-shadow:0 6px 16px rgba(237,145,69,0.25);border:1px solid var(--color-3);}
        .sidebar-promo h4{font-family:var(--font-title);font-size:20px;margin-bottom:6px;color:var(--color-1);}
        .sidebar-promo p{font-size:12px;line-height:1.4;color:var(--color-1);opacity:0.95;}
        .content{flex:1;padding:30px 35px 60px;display:flex;flex-direction:column;gap:22px;}
        .active-filters-bar{display:flex;align-items:center;flex-wrap:wrap;gap:8px;background-color:var(--color-2);border:1px solid var(--color-3);border-radius:12px;padding:10px 16px;font-size:13px;}
        .filter-tag{background-color:var(--color-5);color:var(--color-1);padding:3px 10px;border-radius:14px;font-weight:600;display:inline-flex;align-items:center;gap:6px;font-size:12px;}
        .filter-tag button{background:none;border:none;color:#fff;cursor:pointer;font-weight:bold;}
        .section-header{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:15px;border-bottom:2px solid var(--color-3);padding-bottom:16px;}
        .section-header-left h2{font-family:var(--font-title);font-size:34px;color:var(--color-8);line-height:1.1;}
        .section-header-left p{color:var(--color-6);font-size:14.5px;margin-top:4px;}
        .dishes-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(285px,1fr));gap:26px;}
        .dish-card{background-color:var(--color-2);border-radius:20px;overflow:hidden;box-shadow:var(--shadow-card);border:1px solid var(--color-3);display:flex;flex-direction:column;transition:var(--transition);position:relative;}
        .dish-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-card-hover);border-color:var(--color-4);}
        .dish-img-container{position:relative;width:100%;height:180px;background-color:var(--color-3);overflow:hidden;display:flex;align-items:center;justify-content:center;}
        .dish-img-container img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;}
        .dish-card:hover .dish-img-container img{transform:scale(1.08);}
        .dish-img-placeholder{width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,var(--color-2),var(--color-3));border:2px dashed var(--color-4);color:var(--color-7);user-select:none;transition:var(--transition);}
        .dish-card:hover .dish-img-placeholder{background:linear-gradient(135deg,var(--color-3),var(--color-4));color:var(--color-8);border-color:var(--color-5);}
        .dish-country-badge{position:absolute;top:12px;left:12px;background-color:rgba(23,12,2,0.85);backdrop-filter:blur(6px);color:var(--color-1);padding:5px 11px;border-radius:20px;font-size:11.5px;font-weight:600;display:flex;align-items:center;gap:5px;box-shadow:0 3px 8px rgba(0,0,0,0.3);border:1px solid rgba(253,241,232,0.2);z-index:2;}
        .dish-nearby-badge{position:absolute;top:12px;right:12px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:#fff;padding:5px 11px;border-radius:20px;font-size:11.5px;font-weight:700;display:flex;align-items:center;gap:5px;box-shadow:0 3px 10px rgba(46,125,50,0.4);border:1px solid rgba(255,255,255,0.3);z-index:2;animation:pulseNearby 2.5s infinite;}
        @keyframes pulseNearby{0%{transform:scale(1)}50%{transform:scale(1.05)}100%{transform:scale(1)}}
        .dish-content{padding:20px;display:flex;flex-direction:column;flex:1;}
        .dish-location-tag{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:600;color:var(--color-6);margin-bottom:6px;background-color:rgba(237,145,69,0.12);padding:3px 8px;border-radius:8px;width:fit-content;}
        .dish-title{font-family:var(--font-title);font-size:23px;font-weight:700;color:var(--color-8);margin-bottom:6px;line-height:1.2;}
        .dish-description{font-size:13px;color:var(--color-7);line-height:1.45;margin-bottom:16px;flex:1;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
        .dish-footer{margin-top:auto;display:flex;flex-direction:column;gap:12px;}
        .dish-price-row{display:flex;align-items:baseline;justify-content:space-between;border-top:1px dashed var(--color-3);padding-top:10px;}
        .dish-price-label{font-size:11.5px;color:var(--color-6);text-transform:uppercase;font-weight:600;}
        .dish-price{font-family:var(--font-body);font-size:21px;font-weight:700;color:var(--color-6);}
        .dish-price span{font-size:13px;font-weight:500;color:var(--color-7);margin-left:2px;}
        .dish-shipping-row{display:flex;align-items:center;justify-content:space-between;background-color:rgba(237,145,69,0.08);border:1px dashed var(--color-4);border-radius:8px;padding:6px 10px;font-size:12px;color:var(--color-7);}
        .dish-shipping-label{display:flex;align-items:center;gap:5px;font-weight:500;}
        .dish-shipping-val{font-weight:700;color:var(--color-6);font-size:13px;}
        .btn-add-cart{width:100%;height:44px;background-color:var(--color-5);color:var(--color-1);border:none;border-radius:12px;font-family:var(--font-body);font-size:14.5px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:var(--transition);box-shadow:0 4px 12px rgba(237,145,69,0.28);}
        .btn-add-cart:hover{background-color:var(--color-6);transform:translateY(-2px);}
        .btn-add-cart.added{background-color:#2e7d32;color:#fff;}
        .no-results{grid-column:1/-1;padding:50px 20px;text-align:center;background-color:var(--color-2);border-radius:20px;border:2px dashed var(--color-4);display:none;}
        .cart-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(23,12,2,0.65);backdrop-filter:blur(4px);z-index:2000;opacity:0;visibility:hidden;transition:var(--transition);}
        .cart-overlay.open{opacity:1;visibility:visible;}
        .cart-drawer{position:fixed;top:0;right:-420px;width:400px;max-width:90vw;height:100%;background-color:var(--color-1);z-index:2001;box-shadow:-5px 0 25px rgba(0,0,0,0.25);display:flex;flex-direction:column;transition:right 0.35s cubic-bezier(0.25,0.8,0.25,1);}
        .cart-drawer.open{right:0;}
        .cart-drawer-header{padding:20px 24px;background-color:var(--color-7);color:var(--color-1);display:flex;align-items:center;justify-content:space-between;}
        .cart-drawer-header h3{font-family:var(--font-title);font-size:24px;}
        .btn-close-cart{background:none;border:none;color:var(--color-1);font-size:24px;cursor:pointer;}
        .cart-items-list{flex:1;overflow-y:auto;padding:20px;display:flex;flex-direction:column;gap:12px;}
        .cart-item{display:flex;align-items:center;gap:12px;background-color:var(--color-2);padding:12px;border-radius:12px;border:1px solid var(--color-3);}
        .cart-item-info{flex:1;}
        .cart-item-title{font-size:13.5px;font-weight:700;color:var(--color-8);margin-bottom:2px;}
        .cart-item-loc{font-size:11px;color:var(--color-6);margin-bottom:4px;}
        .cart-item-price{font-size:13px;font-weight:600;color:var(--color-6);}
        .cart-item-qty{display:flex;align-items:center;gap:8px;margin-top:5px;}
        .qty-btn{width:22px;height:22px;border-radius:6px;border:1px solid var(--color-4);background-color:var(--color-1);color:var(--color-8);font-weight:bold;cursor:pointer;display:flex;align-items:center;justify-content:center;}
        .qty-count{font-size:12px;font-weight:700;}
        .cart-drawer-footer{padding:20px 24px;background-color:var(--color-2);border-top:2px solid var(--color-3);display:flex;flex-direction:column;gap:14px;}
        .cart-total-row{display:flex;align-items:center;justify-content:space-between;}
        .cart-total-value{font-family:var(--font-title);font-size:24px;font-weight:700;color:var(--color-6);}
        .btn-checkout{width:100%;padding:14px;background-color:var(--color-6);color:var(--color-1);border:none;border-radius:12px;font-size:15.5px;font-weight:700;cursor:pointer;transition:var(--transition);}
        .btn-checkout:hover{background-color:var(--color-7);}
        .modal-overlay{position:fixed;top:0;left:0;width:100vw;height:100vh;background-color:rgba(23,12,2,0.7);backdrop-filter:blur(5px);z-index:3000;display:flex;align-items:center;justify-content:center;padding:20px;opacity:0;visibility:hidden;transition:var(--transition);}
        .modal-overlay.open{opacity:1;visibility:visible;}
        .modal-card{width:100%;max-width:500px;background-color:var(--color-1);border:2px solid var(--color-4);border-radius:20px;padding:28px;box-shadow:0 20px 50px rgba(0,0,0,0.35);transform:translateY(20px);transition:var(--transition);max-height:90vh;overflow-y:auto;}
        .modal-overlay.open .modal-card{transform:translateY(0);}
        .modal-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;border-bottom:2px solid var(--color-2);padding-bottom:12px;}
        .modal-header h3{font-family:var(--font-title);font-size:24px;color:var(--color-7);}
        .btn-close-modal{background:none;border:none;font-size:20px;color:var(--color-7);cursor:pointer;}
        .city-chips-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin:15px 0;}
        .city-chip-btn{padding:10px;background-color:var(--color-2);border:1.5px solid var(--color-3);border-radius:10px;font-family:var(--font-body);font-size:13.5px;font-weight:600;color:var(--color-8);cursor:pointer;transition:var(--transition);text-align:center;}
        .city-chip-btn:hover{border-color:var(--color-5);background-color:var(--color-3);}
        .city-chip-btn.selected{background-color:var(--color-5);color:var(--color-1);border-color:var(--color-6);}
        .checkout-modal-card{max-width:600px;}
        .checkout-step-title{font-size:14px;font-weight:700;color:var(--color-7);text-transform:uppercase;letter-spacing:0.6px;margin:16px 0 8px;display:flex;align-items:center;gap:6px;}
        .payment-method-selector{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;}
        .payment-card-option{background-color:#fff;border:2px solid var(--color-3);border-radius:12px;padding:14px;cursor:pointer;transition:var(--transition);display:flex;flex-direction:column;gap:4px;position:relative;}
        .payment-card-option:hover{border-color:var(--color-4);}
        .payment-card-option.active{border-color:var(--color-5);background-color:#fdf5ee;box-shadow:0 4px 12px rgba(237,145,69,0.2);}
        .payment-card-option .option-header{display:flex;align-items:center;gap:8px;font-size:15px;font-weight:700;color:var(--color-8);}
        .payment-card-option .option-desc{font-size:12px;color:var(--color-6);}
        .wallets-container{display:none;background-color:var(--color-2);border:1.5px solid var(--color-3);border-radius:14px;padding:16px;margin-top:10px;}
        .wallets-container.show{display:flex;flex-direction:column;gap:12px;}
        .wallets-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:8px;}
        .wallet-chip{background-color:#fff;border:1.5px solid var(--color-3);border-radius:10px;padding:8px;font-size:12.5px;font-weight:600;color:var(--color-8);cursor:pointer;text-align:center;transition:var(--transition);display:flex;align-items:center;justify-content:center;gap:5px;}
        .wallet-chip:hover{border-color:var(--color-5);background-color:var(--color-1);}
        .wallet-chip.active{background-color:var(--color-5);border-color:var(--color-6);color:#fff;}
        .other-wallet-input-group{display:none;margin-top:6px;}
        .other-wallet-input-group.show{display:flex;flex-direction:column;gap:4px;}
        .transfer-data-box{background-color:#fff;border-left:4px solid var(--color-5);border-radius:8px;padding:10px 14px;font-size:12px;color:var(--color-8);line-height:1.5;}
        .form-input{width:100%;padding:10px 14px;border:1.5px solid var(--color-3);border-radius:10px;background-color:#fff;color:var(--color-10);font-family:var(--font-body);font-size:13.5px;outline:none;transition:var(--transition);}
        .form-input:focus{border-color:var(--color-5);box-shadow:0 0 0 3px rgba(237,145,69,0.2);}
        .toast-container{position:fixed;bottom:25px;right:25px;z-index:4000;display:flex;flex-direction:column;gap:10px;pointer-events:none;}
        .toast{background-color:var(--color-8);color:var(--color-1);padding:14px 20px;border-radius:12px;border-left:5px solid var(--color-5);box-shadow:0 8px 25px rgba(0,0,0,0.3);display:flex;align-items:center;gap:12px;font-size:13.5px;font-weight:500;transform:translateY(30px);opacity:0;transition:all 0.3s ease;pointer-events:auto;}
        .toast.show{transform:translateY(0);opacity:1;}
        @media(max-width:990px){.header{flex-wrap:wrap;padding:12px 20px;}.header-search-filter-section{order:3;max-width:100%;width:100%;margin-top:8px;}.main-container{flex-direction:column;}.sidebar{width:100%;border-right:none;border-bottom:2px solid var(--color-3);}.filters-dropdown-menu{left:0;transform:translateY(10px);width:100%;}.filters-dropdown-menu.open{transform:translateY(0);}.filters-two-parts-grid{grid-template-columns:1fr;}}
        @media(max-width:600px){.payment-method-selector{grid-template-columns:1fr;}.city-chips-grid{grid-template-columns:1fr;}}
    </style>
</head>
<body>
    <header class="header">
        <a href="/menu" class="logo-container" title="El Viejo Hogar">
            <div class="logo-img-wrapper">
                <img src="../Otros/Logo 500x500 px.png" alt="Logo El viejo hogar" onerror="this.onerror=null;this.src='../Proyecto_ElviejoHogar/Logo 500x500 px.jpeg';">
            </div>
            <div class="logo-text">
                <h1>El viejo hogar</h1>
                <span>Un sabor tan familiar</span>
            </div>
        </a>

        <div class="header-search-filter-section">
            <div class="header-search-bar">
                <input type="text" id="headerSearchInput" placeholder="Buscar por platillo, ingrediente..." autocomplete="off">
                <span class="header-search-icon">🔍</span>
                <button class="btn-clear-search" id="btnClearSearch" title="Borrar búsqueda">✕</button>
            </div>
            <div class="header-filters-wrapper">
                <button class="btn-header-filters" id="btnToggleFilters">
                    <span>⚡ Filtros</span>
                    <span class="filters-count-badge" id="activeFiltersBadge">0</span>
                    <span id="filterChevron">▾</span>
                </button>
                <div class="filters-dropdown-menu" id="filtersDropdownMenu">
                    <div class="filters-dropdown-header">
                        <h4>⚡ Filtros Avanzados</h4>
                        <button class="btn-close-dropdown" id="btnCloseDropdown">✕</button>
                    </div>
                    <div class="filters-two-parts-grid">
                        <div class="filter-part-1">
                            <div class="filter-part-title"><span>📍 Parte 1: Cercanía y Locales</span></div>
                            <div class="nearby-toggle-card" id="nearbyToggleCard">
                                <div class="nearby-text-group">
                                    <span class="nearby-text-title"><span>🛵 Solo pedidos cercanos</span></span>
                                    <span class="nearby-text-desc" id="nearbyCardDesc">Coincide con tu ciudad: <strong id="filterUserCityHighlight">{{ $usuario['ciudad'] ?? 'Córdoba' }}</strong></span>
                                </div>
                                <input type="checkbox" id="nearbyCheckbox" class="nearby-checkbox">
                            </div>
                            <div class="filter-field-group">
                                <label class="filter-field-label" for="filterCitySelect">Filtrar por Ciudad:</label>
                                <select id="filterCitySelect" class="filter-select">
                                    <option value="all">🌐 Todas las ciudades</option>
                                    @foreach($platillos->pluck('ciudad')->unique()->sort()->values() as $ciudad)
                                        <option value="{{ $ciudad }}">📍 {{ $ciudad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="filter-field-group">
                                <label class="filter-field-label" for="filterLocalSelect">Filtrar por Local:</label>
                                <select id="filterLocalSelect" class="filter-select">
                                    <option value="all">🏬 Todos los locales</option>
                                    @foreach($platillos->map(fn($p) => $p->local . ' - ' . $p->calle)->unique()->sort()->values() as $loc)
                                        <option value="{{ $loc }}">🏬 {{ $loc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="filter-part-2">
                            <div class="filter-part-title"><span>🌎 Parte 2: País y Preferencias</span></div>
                            <div class="filter-field-group">
                                <label class="filter-field-label">País de Origen:</label>
                                <div class="country-chips-grid">
                                    <button type="button" class="country-chip active" data-country="all">🌐 Todos</button>
                                    <button type="button" class="country-chip" data-country="Argentina">🇦🇷 Argentina</button>
                                    <button type="button" class="country-chip" data-country="España">🇪🇸 España</button>
                                    <button type="button" class="country-chip" data-country="México">🇲🇽 México</button>
                                    <button type="button" class="country-chip" data-country="China">🇨🇳 China</button>
                                </div>
                            </div>
                            <div class="filter-field-group">
                                <label class="filter-field-label" for="filterSortSelect">Ordenar catálogo:</label>
                                <select id="filterSortSelect" class="filter-select">
                                    <option value="featured">Destacados</option>
                                    <option value="price-asc">Precio: Menor a Mayor</option>
                                    <option value="price-desc">Precio: Mayor a Menor</option>
                                    <option value="name-asc">Nombre (A - Z)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="filters-dropdown-footer">
                        <button type="button" class="btn-reset-dropdown" id="btnResetAllFilters">Restablecer filtros</button>
                        <button type="button" class="btn-apply-dropdown" id="btnApplyFilters">Aplicar Filtros</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-actions">
            <div class="client-location-pill" id="btnOpenCityModal">
                <span>📍 Vivo en:</span>
                <span class="loc-city" id="headerUserCityText">{{ $usuario['ciudad'] ?? 'Córdoba' }}</span>
                <span class="btn-edit-loc">Cambiar</span>
            </div>
            <button class="btn-cart" id="btnOpenCart" aria-label="Ver carrito">
                🛒
                <span class="cart-badge" id="cartCount">0</span>
            </button>
            @if(isset($usuario['rol']) && $usuario['rol'] === 'admin')
            <a href="/admin" class="btn-admin-link">✎ Panel Admin</a>
            @endif
            <div class="user-profile">
                <div class="user-avatar"><span id="userAvatarIcon">{{ isset($usuario['rol']) && $usuario['rol'] === 'admin' ? '👑' : '👤' }}</span></div>
                <div class="user-info">
                    <span class="user-name" id="userNameDisplay">{{ $usuario['nombre'] ?? 'Cliente' }}</span>
                </div>
                <a href="/logout" class="btn-logout-client" id="btnLogoutClient">Salir</a>
            </div>
        </div>
    </header>

    <div class="main-container">
        <aside class="sidebar">
            <div class="sidebar-card">
                <div class="sidebar-card-title">📍 Mi Ciudad Actual</div>
                <div class="sidebar-user-city-box">
                    <div>
                        <strong id="sidebarCityName" style="color:var(--color-8);font-size:14px">{{ $usuario['ciudad'] ?? 'Córdoba' }}</strong>
                        <div style="font-size:11px;color:var(--color-6)">Pedidos considerados cercanos</div>
                    </div>
                    <button class="sidebar-btn-modify-city" id="sidebarBtnModifyCity">Modificar</button>
                </div>
                <p style="font-size:11.5px;color:var(--color-7);line-height:1.4">Los platillos con tu misma ciudad se marcarán como <strong>Cercanos a ti</strong>.</p>
            </div>

            <div class="sidebar-card">
                <div class="sidebar-card-title">🏬 Sucursales Disponibles</div>
                <div id="branchesListContainer">
                    @php
                        $userCiudad = $usuario['ciudad'] ?? 'Córdoba';
                        $cityBranches = $platillos->where('ciudad', $userCiudad)->unique(fn($p) => $p->local . $p->calle);
                    @endphp
                    @forelse($cityBranches as $branch)
                        <div class="branch-item">
                            <strong>{{ $branch->local }}</strong>
                            <span>📍 {{ $branch->calle }}</span>
                        </div>
                    @empty
                        <div style="font-size:11.5px;color:var(--color-6)">Sin sucursales en {{ $userCiudad }}.</div>
                    @endforelse
                </div>
            </div>

            <div class="sidebar-card">
                <div class="sidebar-card-title">💳 Métodos de Pago</div>
                <div style="font-size:12px;color:var(--color-8);display:flex;flex-direction:column;gap:6px">
                    <div>💵 <strong>Efectivo</strong> contra entrega</div>
                    <div>📲 <strong>Transferencia:</strong> Mercado Pago, MODO, Cuenta DNI, Ualá, Lemon y más.</div>
                </div>
            </div>

            <div class="sidebar-promo">
                <h4>✨ El Viejo Hogar</h4>
                <p>Comida artesanal elaborada en el local más cercano a tu domicilio.</p>
            </div>
        </aside>

        <main class="content">
            <div class="active-filters-bar" id="activeFiltersBar" style="display:none">
                <span style="font-weight:700;color:var(--color-7)">Filtros aplicados:</span>
                <div id="activeFilterTagsContainer" style="display:flex;flex-wrap:wrap;gap:6px"></div>
                <button type="button" id="btnClearActiveFilters" style="margin-left:auto;background:none;border:none;color:var(--color-6);cursor:pointer;font-size:12px;text-decoration:underline">Limpiar todos</button>
            </div>

            <div class="section-header">
                <div class="section-header-left">
                    <h2 id="currentCategoryTitle">Catálogo de Platillos</h2>
                    <p id="resultsCountText">Mostrando {{ $platillos->count() }} platillos disponibles</p>
                </div>
            </div>

            <div class="dishes-grid" id="dishesContainer"></div>

            <div class="no-results" id="noResultsMessage">
                <div style="font-size:48px;margin-bottom:12px">🍽️</div>
                <h3 style="font-family:var(--font-title);font-size:26px;color:var(--color-8);margin-bottom:6px">No se encontraron platillos</h3>
                <p style="color:var(--color-6);font-size:14.5px">No hay platillos que coincidan con los filtros seleccionados.</p>
                <button type="button" class="btn-apply-dropdown" id="btnResetNoResults" style="margin-top:15px">Ver todos los platillos</button>
            </div>
        </main>
    </div>

    <!-- CARRITO -->
    <div class="cart-overlay" id="cartOverlay"></div>
    <div class="cart-drawer" id="cartDrawer">
        <div class="cart-drawer-header">
            <h3>🛒 Mi Carrito</h3>
            <button class="btn-close-cart" id="btnCloseCart">✕</button>
        </div>
        <div class="cart-items-list" id="cartItemsList"></div>
        <div class="cart-drawer-footer">
            <div class="cart-total-row">
                <span style="font-size:16px;font-weight:600;color:var(--color-8)">Total a pagar:</span>
                <span class="cart-total-value" id="cartTotalText">$ 0 ARS</span>
            </div>
            <button class="btn-checkout" id="btnOpenCheckout">Proceder al Pago y Pedido</button>
        </div>
    </div>

    <!-- MODAL CIUDAD -->
    <div class="modal-overlay" id="cityModal">
        <div class="modal-card">
            <div class="modal-header">
                <h3>📍 ¿Dónde vives?</h3>
                <button class="btn-close-modal" id="btnCloseCityModal">✕</button>
            </div>
            <p style="font-size:13.5px;color:var(--color-7);margin-bottom:14px;line-height:1.4">Indica tu ciudad para mostrarte los platillos y locales más cercanos a ti:</p>
            <div class="city-chips-grid">
                <button type="button" class="city-chip-btn" data-city="Córdoba">📍 Córdoba</button>
                <button type="button" class="city-chip-btn" data-city="Buenos Aires">📍 Buenos Aires</button>
                <button type="button" class="city-chip-btn" data-city="Rosario">📍 Rosario</button>
                <button type="button" class="city-chip-btn" data-city="Mendoza">📍 Mendoza</button>
            </div>
            <div style="margin-top:15px">
                <label style="font-size:13px;font-weight:600;color:var(--color-8);display:block;margin-bottom:5px">O escribe otra ciudad:</label>
                <input type="text" id="customCityInput" class="form-input" placeholder="Ej: Salta, Santa Fe, Mar del Plata...">
            </div>
            <div style="margin-top:22px;display:flex;gap:10px;justify-content:flex-end">
                <button type="button" class="btn-reset-dropdown" id="btnCancelCityModal">Cancelar</button>
                <button type="button" class="btn-apply-dropdown" id="btnSaveUserCity">Guardar Ciudad</button>
            </div>
        </div>
    </div>

    <!-- MODAL CHECKOUT -->
    <div class="modal-overlay" id="checkoutModal">
        <div class="modal-card checkout-modal-card">
            <div class="modal-header">
                <h3>🛍️ Finalizar Pedido</h3>
                <button class="btn-close-modal" id="btnCloseCheckoutModal">✕</button>
            </div>
            <div style="background-color:var(--color-2);border-radius:12px;padding:14px 18px;margin-bottom:16px;border:1px solid var(--color-3)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;font-size:13px;color:var(--color-7)">
                    <span id="checkoutItemsCountText">0 platillos en tu orden</span>
                    <span id="checkoutSubtotalAmount" style="font-weight:600">$ 0 ARS</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;font-size:13px;color:var(--color-7)">
                    <span>🛵 Costo de envío:</span>
                    <span id="checkoutShippingAmount" style="font-weight:600;color:var(--color-6)">$ 1.200 ARS</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;padding-top:8px;border-top:1px dashed var(--color-4)">
                    <span style="font-weight:700;color:var(--color-8);font-size:15px">Total a pagar:</span>
                    <strong style="color:var(--color-6);font-size:20px" id="checkoutTotalAmount">$ 0 ARS</strong>
                </div>
            </div>
            <form id="checkoutForm">
                @csrf
                <div class="checkout-step-title">📍 Datos de Entrega</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:10px">
                    <div>
                        <label style="font-size:12px;font-weight:600;color:var(--color-7)">Nombre de quien recibe:</label>
                        <input type="text" id="checkoutClientName" class="form-input" required placeholder="Tu nombre" value="{{ $usuario['nombre'] ?? '' }}">
                    </div>
                    <div>
                        <label style="font-size:12px;font-weight:600;color:var(--color-7)">Ciudad de entrega:</label>
                        <input type="text" id="checkoutClientCity" class="form-input" required placeholder="Ciudad" value="{{ $usuario['ciudad'] ?? '' }}">
                    </div>
                </div>
                <div style="margin-bottom:14px">
                    <label style="font-size:12px;font-weight:600;color:var(--color-7)">Dirección y Calle exacta:</label>
                    <input type="text" id="checkoutClientAddress" class="form-input" required placeholder="Calle, número, piso/depto">
                </div>
                <div class="checkout-step-title">💳 ¿Cómo vas a pagar?</div>
                <div class="payment-method-selector">
                    <div class="payment-card-option active" id="payOptionCash" onclick="selectPaymentMethod('efectivo')">
                        <div class="option-header"><span>💵</span><span>Efectivo</span></div>
                        <span class="option-desc">Pagas en mano al recibir tu pedido</span>
                    </div>
                    <div class="payment-card-option" id="payOptionTransfer" onclick="selectPaymentMethod('transferencia')">
                        <div class="option-header"><span>📲</span><span>Transferencia</span></div>
                        <span class="option-desc">Billeteras virtuales / CBU / Alias</span>
                    </div>
                </div>
                <div id="cashNoticeBox" style="background-color:var(--color-2);border:1px solid var(--color-4);border-radius:10px;padding:10px 14px;margin-bottom:14px;font-size:12.5px;color:var(--color-8);display:flex;align-items:center;gap:8px">
                    <span style="font-size:18px">💵</span>
                    <span>Pagas el monto total en efectivo al repartidor al momento de recibir el pedido.</span>
                </div>
                <div class="wallets-container" id="walletsContainer">
                    <label style="font-size:12.5px;font-weight:700;color:var(--color-7)">Selecciona tu Billetera Virtual:</label>
                    <div class="wallets-grid">
                        <div class="wallet-chip active" onclick="selectWallet('Mercado Pago')">💙 Mercado Pago</div>
                        <div class="wallet-chip" onclick="selectWallet('MODO')">🟢 MODO</div>
                        <div class="wallet-chip" onclick="selectWallet('Cuenta DNI')">🏛️ Cuenta DNI</div>
                        <div class="wallet-chip" onclick="selectWallet('Ualá')">🟣 Ualá</div>
                        <div class="wallet-chip" onclick="selectWallet('Lemon Cash')">🍋 Lemon</div>
                        <div class="wallet-chip" onclick="selectWallet('Personal Pay')">🟠 Personal Pay</div>
                        <div class="wallet-chip" onclick="selectWallet('Otros')">➕ Otros</div>
                    </div>
                    <div class="other-wallet-input-group" id="otherWalletInputGroup">
                        <label style="font-size:11.5px;font-weight:600;color:var(--color-7)">Especifica cuál billetera o banco:</label>
                        <input type="text" id="otherWalletTextInput" class="form-input" placeholder="Ej: BNA+, Brubank, Naranja X...">
                    </div>
                    <div class="transfer-data-box">
                        <strong>Datos de cuenta del restaurante:</strong><br>
                        • <strong>Alias:</strong> <code>elviejo.hogar.mp</code><br>
                        • <strong>CVU:</strong> <code>0000003100049281729381</code><br>
                        • <strong>Titular:</strong> El Viejo Hogar S.R.L.
                    </div>
                </div>
                <div style="margin-top:24px;display:flex;gap:10px;justify-content:flex-end">
                    <button type="button" class="btn-reset-dropdown" id="btnCancelCheckout">Cancelar</button>
                    <button type="submit" class="btn-apply-dropdown" id="btnConfirmOrder" style="padding:12px 24px">✓ Confirmar y Enviar Pedido</button>
                </div>
            </form>
        </div>
    </div>

    <div class="toast-container" id="toastContainer"></div>

    <script>
        // ====================================================
        // DATOS DE PLATILLOS DESDE PHP/BD
        // ====================================================
        const ALL_DISHES = @json($platillos->values());
        const ALL_LOCALES = @json($locales->values());
        const USER_CIUDAD = '{{ $usuario["ciudad"] ?? "Córdoba" }}';
        const IS_ADMIN = {{ isset($usuario['rol']) && $usuario['rol'] === 'admin' ? 'true' : 'false' }};

        // ====================================================
        // ESTADO DE LA APLICACIÓN
        // ====================================================
        let dishes = ALL_DISHES;
        let userCity = USER_CIUDAD;
        let onlyNearby = false;
        let selectedFilterCity = 'all';
        let selectedFilterLocal = 'all';
        let activeCountryFilter = 'all';
        let searchQuery = '';
        let currentSort = 'featured';
        let cart = [];
        let selectedPaymentMethod = 'efectivo';
        let selectedWallet = 'Mercado Pago';

        // ====================================================
        // HELPER SHIPPING COST
        // ====================================================
        function getDishShippingCost(dish) {
            let match = ALL_LOCALES.find(l =>
                (dish.local && l.nombre.toLowerCase().includes(dish.local.toLowerCase())) ||
                (dish.calle && l.calle.toLowerCase().includes(dish.calle.toLowerCase()))
            );
            if (!match && dish.ciudad) {
                match = ALL_LOCALES.find(l => l.ciudad.toLowerCase() === dish.ciudad.toLowerCase());
            }
            return match ? (Number(match.costo_envio) || 1200) : 1200;
        }

        function getCartShippingCost() {
            if (!cart || cart.length === 0) return 0;
            const costs = cart.map(item => getDishShippingCost(item));
            return Math.max(...costs, 1200);
        }

        // ====================================================
        // RENDERIZADO
        // ====================================================
        function renderDishes() {
            let filtered = [...dishes];

            if (onlyNearby) {
                filtered = filtered.filter(d => d.ciudad && d.ciudad.toLowerCase() === userCity.toLowerCase());
            }
            if (selectedFilterCity !== 'all' && !onlyNearby) {
                filtered = filtered.filter(d => d.ciudad && d.ciudad.toLowerCase() === selectedFilterCity.toLowerCase());
            }
            if (selectedFilterLocal !== 'all') {
                filtered = filtered.filter(d => `${d.local} - ${d.calle}` === selectedFilterLocal);
            }
            if (activeCountryFilter !== 'all') {
                filtered = filtered.filter(d => d.pais && d.pais.toLowerCase() === activeCountryFilter.toLowerCase());
            }
            if (searchQuery.trim() !== '') {
                const q = searchQuery.toLowerCase().trim();
                filtered = filtered.filter(d =>
                    d.nombre.toLowerCase().includes(q) ||
                    d.descripcion.toLowerCase().includes(q) ||
                    d.pais.toLowerCase().includes(q) ||
                    (d.ciudad && d.ciudad.toLowerCase().includes(q)) ||
                    (d.local && d.local.toLowerCase().includes(q))
                );
            }

            if (currentSort === 'price-asc') filtered.sort((a, b) => a.precio - b.precio);
            else if (currentSort === 'price-desc') filtered.sort((a, b) => b.precio - a.precio);
            else if (currentSort === 'name-asc') filtered.sort((a, b) => a.nombre.localeCompare(b.nombre));
            else {
                filtered.sort((a, b) => {
                    const aN = a.ciudad && a.ciudad.toLowerCase() === userCity.toLowerCase() ? 1 : 0;
                    const bN = b.ciudad && b.ciudad.toLowerCase() === userCity.toLowerCase() ? 1 : 0;
                    if (aN !== bN) return bN - aN;
                    return a.id - b.id;
                });
            }

            document.getElementById('resultsCountText').textContent = `Mostrando ${filtered.length} de ${dishes.length} platillos`;
            updateActiveFiltersUI();

            const container = document.getElementById('dishesContainer');
            const noResults = document.getElementById('noResultsMessage');

            if (filtered.length === 0) {
                container.innerHTML = '';
                noResults.style.display = 'block';
                return;
            }
            noResults.style.display = 'none';

            container.innerHTML = filtered.map(dish => {
                const isNearby = dish.ciudad && dish.ciudad.toLowerCase() === userCity.toLowerCase();
                const shippingCost = getDishShippingCost(dish);
                const nearbyBadge = isNearby ? `<div class="dish-nearby-badge"><span>✨ Cercano a ti</span></div>` : '';
                const imageContent = dish.imagen && dish.imagen.trim() !== ''
                    ? `<img src="../${dish.imagen}" alt="${dish.nombre}" loading="lazy">`
                    : `<div class="dish-img-placeholder"><span style="font-size:32px;opacity:0.75">📷</span><span style="font-size:11px;font-weight:700;text-transform:uppercase">Imagen del platillo</span></div>`;

                return `
                <article class="dish-card" data-id="${dish.id}">
                    <div class="dish-img-container">
                        ${imageContent}
                        <div class="dish-country-badge"><span>${dish.bandera || '🍽️'}</span><span>${dish.pais}</span></div>
                        ${nearbyBadge}
                    </div>
                    <div class="dish-content">
                        <div class="dish-location-tag" title="${dish.local}, ${dish.calle} (${dish.ciudad})">
                            <span>📍</span>
                            <span>${dish.ciudad} · ${dish.local} (${dish.calle})</span>
                        </div>
                        <h3 class="dish-title">${dish.nombre}</h3>
                        <p class="dish-description">${dish.descripcion}</p>
                        <div class="dish-footer">
                            <div class="dish-price-row">
                                <span class="dish-price-label">Precio</span>
                                <div class="dish-price">$ ${Number(dish.precio).toLocaleString('es-AR')} <span>ARS</span></div>
                            </div>
                            <div class="dish-shipping-row">
                                <span class="dish-shipping-label">🛵 Costo de envío:</span>
                                <strong class="dish-shipping-val">$ ${shippingCost.toLocaleString('es-AR')} ARS</strong>
                            </div>
                            <button class="btn-add-cart" onclick="addToCart(${dish.id})">
                                <span>🛒</span><span>Agregar al carrito</span>
                            </button>
                        </div>
                    </div>
                </article>`;
            }).join('');
        }

        // ====================================================
        // FILTROS
        // ====================================================
        function updateActiveFiltersUI() {
            let count = 0;
            const tags = [];
            if (onlyNearby) { count++; tags.push({ label: `🛵 Cercanos a ${userCity}`, clear: () => setNearbyFilter(false) }); }
            if (selectedFilterCity !== 'all' && !onlyNearby) { count++; tags.push({ label: `📍 Ciudad: ${selectedFilterCity}`, clear: () => { selectedFilterCity = 'all'; document.getElementById('filterCitySelect').value = 'all'; renderDishes(); } }); }
            if (selectedFilterLocal !== 'all') { count++; tags.push({ label: `🏬 ${selectedFilterLocal}`, clear: () => { selectedFilterLocal = 'all'; document.getElementById('filterLocalSelect').value = 'all'; renderDishes(); } }); }
            if (activeCountryFilter !== 'all') { count++; tags.push({ label: `🌎 ${activeCountryFilter}`, clear: () => setCountryFilter('all') }); }
            if (searchQuery.trim()) { count++; tags.push({ label: `🔍 "${searchQuery}"`, clear: () => { searchQuery = ''; document.getElementById('headerSearchInput').value = ''; document.getElementById('btnClearSearch').style.display = 'none'; renderDishes(); } }); }

            document.getElementById('activeFiltersBadge').textContent = count;
            const bar = document.getElementById('activeFiltersBar');
            const tagsContainer = document.getElementById('activeFilterTagsContainer');
            if (tags.length > 0) {
                bar.style.display = 'flex';
                tagsContainer.innerHTML = tags.map((t, idx) => `<span class="filter-tag"><span>${t.label}</span><button onclick="clearSingleFilter(${idx})">✕</button></span>`).join('');
                window.__fTags = tags;
            } else {
                bar.style.display = 'none';
                tagsContainer.innerHTML = '';
            }
        }

        window.clearSingleFilter = function(idx) { if (window.__fTags && window.__fTags[idx]) window.__fTags[idx].clear(); };

        function setNearbyFilter(en) {
            onlyNearby = en;
            document.getElementById('nearbyCheckbox').checked = en;
            document.getElementById('nearbyToggleCard').classList.toggle('active', en);
            renderDishes();
        }

        function setCountryFilter(c) {
            activeCountryFilter = c;
            document.querySelectorAll('.country-chip').forEach(chip => chip.classList.toggle('active', chip.getAttribute('data-country').toLowerCase() === c.toLowerCase()));
            renderDishes();
        }

        // ====================================================
        // CARRITO
        // ====================================================
        function addToCart(dishId) {
            const dish = dishes.find(d => d.id === dishId);
            if (!dish) return;
            const ex = cart.find(i => i.id === dishId);
            if (ex) { ex.quantity++; } else {
                cart.push({ id: dish.id, nombre: dish.nombre, precio: dish.precio, bandera: dish.bandera || '🍽️', ciudad: dish.ciudad, local: dish.local, calle: dish.calle, quantity: 1 });
            }
            updateCartUI();
            showToast(`¡${dish.nombre} agregado al carrito!`, dish.bandera || '🍽️');
            const btn = document.querySelector(`.dish-card[data-id="${dishId}"] .btn-add-cart`);
            if (btn) { btn.classList.add('added'); btn.innerHTML = `✓ ¡Agregado!`; setTimeout(() => { btn.classList.remove('added'); btn.innerHTML = `<span>🛒</span><span>Agregar al carrito</span>`; }, 1200); }
        }

        function changeCartQty(dishId, delta) {
            const item = cart.find(i => i.id === dishId);
            if (!item) return;
            item.quantity += delta;
            if (item.quantity <= 0) cart = cart.filter(i => i.id !== dishId);
            updateCartUI();
        }

        function updateCartUI() {
            const totalCount = cart.reduce((s, i) => s + i.quantity, 0);
            const totalPrice = cart.reduce((s, i) => s + (i.precio * i.quantity), 0);
            const cartCount = document.getElementById('cartCount');
            cartCount.textContent = totalCount;
            cartCount.classList.add('bump');
            setTimeout(() => cartCount.classList.remove('bump'), 300);
            document.getElementById('cartTotalText').textContent = `$ ${totalPrice.toLocaleString('es-AR')} ARS`;
            const list = document.getElementById('cartItemsList');
            if (cart.length === 0) {
                list.innerHTML = `<div style="text-align:center;padding:40px 20px;color:var(--color-6)"><p style="font-size:36px;margin-bottom:10px">🧺</p><p style="font-weight:600">Tu carrito está vacío.</p><p style="font-size:12px;margin-top:5px;opacity:0.8">Agrega platillos para comenzar tu pedido.</p></div>`;
            } else {
                list.innerHTML = cart.map(item => `
                <div class="cart-item">
                    <div class="cart-item-info">
                        <div class="cart-item-title">${item.bandera} ${item.nombre}</div>
                        <div class="cart-item-loc">📍 ${item.ciudad} (${item.local})</div>
                        <div class="cart-item-price">$ ${(item.precio * item.quantity).toLocaleString('es-AR')} ARS</div>
                        <div class="cart-item-qty">
                            <button class="qty-btn" onclick="changeCartQty(${item.id}, -1)">−</button>
                            <span class="qty-count">${item.quantity}</span>
                            <button class="qty-btn" onclick="changeCartQty(${item.id}, 1)">＋</button>
                        </div>
                    </div>
                </div>`).join('');
            }
        }

        function toggleCartDrawer(open) {
            document.getElementById('cartOverlay').classList.toggle('open', open);
            document.getElementById('cartDrawer').classList.toggle('open', open);
            document.body.style.overflow = open ? 'hidden' : '';
        }

        // ====================================================
        // CHECKOUT
        // ====================================================
        function selectPaymentMethod(method) {
            selectedPaymentMethod = method;
            document.getElementById('payOptionCash').classList.toggle('active', method === 'efectivo');
            document.getElementById('payOptionTransfer').classList.toggle('active', method === 'transferencia');
            document.getElementById('cashNoticeBox').style.display = method === 'efectivo' ? 'flex' : 'none';
            document.getElementById('walletsContainer').classList.toggle('show', method === 'transferencia');
        }

        function selectWallet(name) {
            selectedWallet = name;
            document.querySelectorAll('.wallet-chip').forEach(c => c.classList.toggle('active', c.textContent.trim().includes(name)));
            document.getElementById('otherWalletInputGroup').classList.toggle('show', name === 'Otros');
            if (name === 'Otros') document.getElementById('otherWalletTextInput').focus();
        }

        function openCheckoutModal() {
            if (cart.length === 0) { alert('Tu carrito está vacío. Agrega al menos un platillo.'); return; }
            toggleCartDrawer(false);
            const totalItems = cart.reduce((s, i) => s + i.quantity, 0);
            const subtotal = cart.reduce((s, i) => s + (i.precio * i.quantity), 0);
            const shipping = getCartShippingCost();
            const grand = subtotal + shipping;
            document.getElementById('checkoutItemsCountText').textContent = `${totalItems} platillo(s) en tu orden`;
            document.getElementById('checkoutSubtotalAmount').textContent = `$ ${subtotal.toLocaleString('es-AR')} ARS`;
            document.getElementById('checkoutShippingAmount').textContent = `$ ${shipping.toLocaleString('es-AR')} ARS`;
            document.getElementById('checkoutTotalAmount').textContent = `$ ${grand.toLocaleString('es-AR')} ARS`;
            selectPaymentMethod('efectivo');
            selectWallet('Mercado Pago');
            document.getElementById('checkoutModal').classList.add('open');
        }

        // Confirmar pedido → envío al servidor
        document.getElementById('checkoutForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const clienteNombre = document.getElementById('checkoutClientName').value.trim();
            const ciudad = document.getElementById('checkoutClientCity').value.trim();
            const direccion = document.getElementById('checkoutClientAddress').value.trim();
            if (!clienteNombre || !ciudad || !direccion) { alert('Por favor completa tu nombre, ciudad y dirección.'); return; }

            let billetera = '';
            if (selectedPaymentMethod === 'transferencia') {
                if (selectedWallet === 'Otros') {
                    billetera = document.getElementById('otherWalletTextInput').value.trim();
                    if (!billetera) { alert("Indica cuál billetera vas a usar."); return; }
                    billetera = `Otros: ${billetera}`;
                } else { billetera = selectedWallet; }
            } else { billetera = 'Efectivo contra entrega'; }

            const subtotal = cart.reduce((s, i) => s + (i.precio * i.quantity), 0);
            const costoEnvio = getCartShippingCost();
            const total = subtotal + costoEnvio;

            const itemsData = cart.map(i => ({ id: i.id, nombre: i.nombre, bandera: i.bandera || '🍽️', ciudad: i.ciudad, local: i.local, quantity: i.quantity, precio: i.precio }));

            const btn = document.getElementById('btnConfirmOrder');
            btn.disabled = true; btn.textContent = 'Procesando...';

            try {
                const resp = await fetch('/pedido', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                    body: JSON.stringify({ cliente_nombre: clienteNombre, ciudad_entrega: ciudad, direccion_entrega: direccion, metodo_pago: selectedPaymentMethod, billetera, subtotal, costo_envio: costoEnvio, total, items: itemsData })
                });
                const data = await resp.json();
                if (data.success) {
                    cart = [];
                    updateCartUI();
                    document.getElementById('checkoutModal').classList.remove('open');
                    showToast(`¡Pedido ${data.codigo} confirmado!`, '🎉');
                    alert(`¡Pedido realizado con éxito!\n\n📋 Código: ${data.codigo}\n👤 Cliente: ${clienteNombre}\n📍 Entrega: ${ciudad}, ${direccion}\n💰 Total: $ ${total.toLocaleString('es-AR')} ARS\n\nEl restaurante ya está preparando tu comida.`);
                } else {
                    alert('Error al procesar el pedido. Inténtalo de nuevo.');
                }
            } catch(err) {
                alert('Error de conexión. Por favor inténtalo de nuevo.');
                console.error(err);
            } finally {
                btn.disabled = false; btn.textContent = '✓ Confirmar y Enviar Pedido';
            }
        });

        // ====================================================
        // TOAST
        // ====================================================
        function showToast(msg, icon) {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerHTML = `<span>${icon}</span><span>${msg}</span>`;
            container.appendChild(toast);
            setTimeout(() => toast.classList.add('show'), 10);
            setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 300); }, 3000);
        }

        // ====================================================
        // MODAL CIUDAD
        // ====================================================
        function setUserCity(city) {
            userCity = city.trim();
            document.getElementById('headerUserCityText').textContent = userCity;
            document.getElementById('filterUserCityHighlight').textContent = userCity;
            document.getElementById('sidebarCityName').textContent = userCity;
            renderDishes();
            showToast(`📍 Ciudad actualizada a "${userCity}"`, '🏙️');
        }

        // ====================================================
        // EVENTOS
        // ====================================================
        document.getElementById('headerSearchInput').addEventListener('input', e => { searchQuery = e.target.value; document.getElementById('btnClearSearch').style.display = searchQuery ? 'block' : 'none'; renderDishes(); });
        document.getElementById('btnClearSearch').addEventListener('click', () => { document.getElementById('headerSearchInput').value = ''; searchQuery = ''; document.getElementById('btnClearSearch').style.display = 'none'; renderDishes(); });
        document.getElementById('btnToggleFilters').addEventListener('click', e => { e.stopPropagation(); document.getElementById('filtersDropdownMenu').classList.toggle('open'); document.getElementById('btnToggleFilters').classList.toggle('active'); });
        document.getElementById('btnCloseDropdown').addEventListener('click', () => { document.getElementById('filtersDropdownMenu').classList.remove('open'); });
        document.addEventListener('click', e => { const menu = document.getElementById('filtersDropdownMenu'); const btn = document.getElementById('btnToggleFilters'); if (!menu.contains(e.target) && !btn.contains(e.target)) { menu.classList.remove('open'); btn.classList.remove('active'); } });
        document.getElementById('nearbyToggleCard').addEventListener('click', () => setNearbyFilter(!onlyNearby));
        document.getElementById('nearbyCheckbox').addEventListener('click', e => { e.stopPropagation(); setNearbyFilter(e.target.checked); });
        document.getElementById('filterCitySelect').addEventListener('change', e => { selectedFilterCity = e.target.value; renderDishes(); });
        document.getElementById('filterLocalSelect').addEventListener('change', e => { selectedFilterLocal = e.target.value; renderDishes(); });
        document.getElementById('filterSortSelect').addEventListener('change', e => { currentSort = e.target.value; renderDishes(); });
        document.querySelectorAll('.country-chip').forEach(chip => chip.addEventListener('click', () => setCountryFilter(chip.getAttribute('data-country'))));
        document.getElementById('btnResetAllFilters').addEventListener('click', () => { onlyNearby = false; selectedFilterCity = 'all'; selectedFilterLocal = 'all'; activeCountryFilter = 'all'; currentSort = 'featured'; document.getElementById('nearbyCheckbox').checked = false; document.getElementById('nearbyToggleCard').classList.remove('active'); document.getElementById('filterCitySelect').value = 'all'; document.getElementById('filterLocalSelect').value = 'all'; document.getElementById('filterSortSelect').value = 'featured'; setCountryFilter('all'); renderDishes(); document.getElementById('filtersDropdownMenu').classList.remove('open'); });
        document.getElementById('btnApplyFilters').addEventListener('click', () => { document.getElementById('filtersDropdownMenu').classList.remove('open'); });
        document.getElementById('btnClearActiveFilters').addEventListener('click', () => { onlyNearby = false; selectedFilterCity = 'all'; selectedFilterLocal = 'all'; activeCountryFilter = 'all'; searchQuery = ''; document.getElementById('headerSearchInput').value = ''; document.getElementById('nearbyCheckbox').checked = false; setCountryFilter('all'); renderDishes(); });
        document.getElementById('btnResetNoResults').addEventListener('click', () => { onlyNearby = false; selectedFilterCity = 'all'; selectedFilterLocal = 'all'; activeCountryFilter = 'all'; searchQuery = ''; document.getElementById('headerSearchInput').value = ''; setCountryFilter('all'); renderDishes(); });
        document.getElementById('btnOpenCart').addEventListener('click', () => toggleCartDrawer(true));
        document.getElementById('btnCloseCart').addEventListener('click', () => toggleCartDrawer(false));
        document.getElementById('cartOverlay').addEventListener('click', () => toggleCartDrawer(false));
        document.getElementById('btnOpenCheckout').addEventListener('click', openCheckoutModal);
        document.getElementById('btnCloseCheckoutModal').addEventListener('click', () => document.getElementById('checkoutModal').classList.remove('open'));
        document.getElementById('btnCancelCheckout').addEventListener('click', () => document.getElementById('checkoutModal').classList.remove('open'));
        document.getElementById('btnOpenCityModal').addEventListener('click', () => document.getElementById('cityModal').classList.add('open'));
        document.getElementById('sidebarBtnModifyCity').addEventListener('click', () => document.getElementById('cityModal').classList.add('open'));
        document.getElementById('btnCloseCityModal').addEventListener('click', () => document.getElementById('cityModal').classList.remove('open'));
        document.getElementById('btnCancelCityModal').addEventListener('click', () => document.getElementById('cityModal').classList.remove('open'));
        document.querySelectorAll('.city-chip-btn').forEach(btn => btn.addEventListener('click', () => { document.querySelectorAll('.city-chip-btn').forEach(b => b.classList.remove('selected')); btn.classList.add('selected'); document.getElementById('customCityInput').value = ''; }));
        document.getElementById('btnSaveUserCity').addEventListener('click', () => { const chips = document.querySelectorAll('.city-chip-btn.selected'); const custom = document.getElementById('customCityInput').value.trim(); const city = custom || (chips.length > 0 ? chips[0].getAttribute('data-city') : ''); if (city) { setUserCity(city); document.getElementById('cityModal').classList.remove('open'); document.querySelectorAll('.city-chip-btn').forEach(b => b.classList.remove('selected')); document.getElementById('customCityInput').value = ''; } else { alert('Por favor selecciona una ciudad o escribe una.'); } });

        // ====================================================
        // INICIALIZACIÓN
        // ====================================================
        renderDishes();
        updateCartUI();
    </script>
</body>
</html>
