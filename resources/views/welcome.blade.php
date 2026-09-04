@extends('layouts.app')

@section('content')
<h2 class="titulo-seccion">Nuestros Productos</h2>

<section class="menu">
    <div class="card">
        <div class="imagen-container">
            <img src="{{ asset('images/producto-default.jpg') }}" alt="Pastas Caseras" onerror="this.src='{{ asset('images/logo.jpeg') }}'">
        </div>
        <div class="card-content">
            <h3>Pastas Caseras</h3>
            <p class="descripcion">Deliciosas pastas frescas preparadas con la receta tradicional de la casa.</p>
            <div class="precio">$ 4.500</div>
            <button type="button" class="btn-carrito">Agregar al Carrito</button>
        </div>
    </div>

    <div class="card">
        <div class="imagen-container">
            <img src="{{ asset('images/producto-default.jpg') }}" alt="Salsas Especiales" onerror="this.src='{{ asset('images/logo.jpeg') }}'">
        </div>
        <div class="card-content">
            <h3>Salsas Artesanales</h3>
            <p class="descripcion">Variedad de salsas elaboradas con ingredientes frescos y naturales.</p>
            <div class="precio">$ 2.200</div>
            <button type="button" class="btn-carrito">Agregar al Carrito</button>
        </div>
    </div>

    <div class="card">
        <div class="imagen-container">
            <img src="{{ asset('images/producto-default.jpg') }}" alt="Postres Caseros" onerror="this.src='{{ asset('images/logo.jpeg') }}'">
        </div>
        <div class="card-content">
            <h3>Postres Caseros</h3>
            <p class="descripcion">El toque dulce tradicional para acompañar tus mejores momentos.</p>
            <div class="precio">$ 2.800</div>
            <button type="button" class="btn-carrito">Agregar al Carrito</button>
        </div>
    </div>

    <div class="card">
        <div class="imagen-container">
            <img src="{{ asset('images/producto-default.jpg') }}" alt="Empanadas Criollas" onerror="this.src='{{ asset('images/logo.jpeg') }}'">
        </div>
        <div class="card-content">
            <h3>Empanadas Criollas</h3>
            <p class="descripcion">Horneadas al punto justo con abundante relleno y sabor auténtico.</p>
            <div class="precio">$ 1.800</div>
            <button type="button" class="btn-carrito">Agregar al Carrito</button>
        </div>
    </div>
</section>
@endsection
