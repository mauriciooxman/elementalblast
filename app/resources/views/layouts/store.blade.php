<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Catálogo') · ElementalBlast TCG</title>
  <link rel="stylesheet" href="{{ asset('css/store.css') }}">
  @yield('head')
</head>
<body>
<a class="skip" href="#contenido">Ir al contenido</a>
<div class="demo store-demo">Demo local · Comercio, productos, compatibilidad, precios y existencias ficticios</div>
<header class="header wrap store-header">
  <a class="brand" href="{{ route('home') }}">
    <img class="brand-logo" src="{{ asset('images/brand/elemental-blast-header.png') }}" alt="Elemental Blast TCG" width="2132" height="452">
  </a>
  <nav aria-label="Navegación principal">
    <a href="{{ route('catalog') }}">Catálogo</a>
    <a class="cart-link {{ $cartQuantityCount > 0 ? 'has-items' : '' }}"
       href="{{ route('cart') }}"
       aria-label="{{ $cartQuantityCount > 0 ? 'Tu carro, '.$cartQuantityCount.' '.($cartQuantityCount === 1 ? 'unidad' : 'unidades') : 'Tu carro vacío' }}">
      Tu carro
      <span class="cart-count" data-cart-count aria-hidden="true" @if($cartQuantityCount === 0) hidden @endif>{{ $cartQuantityCount }}</span>
      <span aria-hidden="true">→</span>
    </a>
  </nav>
</header>
<main class="@yield('main-class', 'wrap')" id="contenido">
  @if(session('status'))<div class="notice" role="status">{{ session('status') }}</div>@endif
  @if($errors->any())
  <div class="notice error" role="alert"><strong>Revisa los datos</strong><ul>
  @foreach($errors->getMessages() as $field => $messages)
  @foreach($messages as $error)
  @php($quantityProductId = str_starts_with($field, 'quantity.') ? substr($field, 9) : null)
  <li>
    @if($quantityProductId !== null)
    <a href="#qty-{{ $quantityProductId }}">{{ $error }}</a>
    @else
    {{ $error }}
    @endif
  </li>
  @endforeach
  @endforeach
  </ul><p>El carro válido se conserva.</p></div>
  @endif
  @yield('content')
</main>
<footer class="wrap footer"><span>ElementalBlast TCG · Tienda de cartas Pokémon</span><span>Tecnología de OxmanIT</span></footer>
</body>
</html>
