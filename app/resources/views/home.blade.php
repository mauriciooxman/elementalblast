@extends('layouts.store')
@section('title', 'Inicio')
@section('main-class', '')
@section('head')
<style>
/* Hero — sección especial solo para portada */
.hero-section {
  position: relative;
  width: 100vw;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  overflow: hidden;
  background: #0B1324;
  /* mobile: cuadrado aprox para encuadre de marca */
  aspect-ratio: 1 / 1;
}
@media (min-width: 600px) {
  .hero-section { aspect-ratio: 16 / 9; max-height: 85vh; }
}
.hero-section video,
.hero-section img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
  border-radius: 0;
}
/* Gradient overlay solo en móvil si se quiere texto extra (reservado) */
.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, rgba(11,19,36,0.15) 0%, rgba(11,19,36,0.55) 100%);
  pointer-events: none;
}
.hero-controls {
  position: absolute;
  bottom: 16px;
  right: 16px;
  z-index: 2;
}
.hero-pause {
  background: rgba(11,19,36,0.65);
  border: 1px solid rgba(243,247,250,0.3);
  color: #F3F7FA;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.2s;
}
.hero-pause:hover, .hero-pause:focus-visible {
  background: rgba(84,217,255,0.25);
  outline: 2px solid #54D9FF;
  outline-offset: 2px;
}
/* CTA bajo el hero */
.hero-cta {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  padding: 48px 20px 56px;
  text-align: center;
  background: #0B1324;
  /* full bleed */
  width: 100vw;
  left: 50%;
  margin-left: -50vw;
  position: relative;
}
.hero-cta h2 {
  color: #F3F7FA;
  font-size: clamp(22px, 4vw, 36px);
  font-weight: 700;
  letter-spacing: -0.02em;
  margin: 0;
}
.hero-cta p {
  color: rgba(243,247,250,0.72);
  font-size: 16px;
  max-width: 480px;
  margin: 0;
}
.btn-catalog {
  display: inline-block;
  background: #FF882F;
  color: #0B1324;
  font-weight: 750;
  font-size: 18px;
  padding: 16px 36px;
  border-radius: 12px;
  text-decoration: none;
  border: none;
  cursor: pointer;
  transition: background 0.18s, transform 0.12s;
  line-height: 1;
}
.btn-catalog:hover {
  background: #ff9d52;
  transform: translateY(-1px);
}
.btn-catalog:focus-visible {
  outline: 3px solid #54D9FF;
  outline-offset: 3px;
}
/* reduced motion: sin video */
@media (prefers-reduced-motion: reduce) {
  .hero-video { display: none; }
  .hero-poster { display: block !important; }
}
.hero-poster { display: none; }
</style>
@endsection
@section('content')

{{-- Hero video --}}
<section class="hero-section" aria-label="Presentación ElementalBlast TCG">
  {{-- Video principal --}}
  <video
    class="hero-video"
    src="{{ asset('images/brand/hero.mp4') }}"
    poster="{{ asset('images/brand/hero-poster.jpg') }}"
    autoplay
    muted
    loop
    playsinline
    preload="metadata"
    aria-hidden="true"
  ></video>
  {{-- Fallback para prefers-reduced-motion --}}
  <img
    class="hero-poster"
    src="{{ asset('images/brand/hero-poster.jpg') }}"
    alt="ElementalBlast TCG — Tienda de cartas Pokémon"
    width="1280"
    height="720"
  >
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="hero-controls">
    <button class="hero-pause" id="hero-toggle" aria-label="Pausar video" aria-pressed="false" title="Pausar / reanudar">
      ⏸
    </button>
  </div>
</section>

{{-- CTA --}}
<div class="hero-cta">
  <h2>Pokémon Chile</h2>
  <p>Encuentra sobres, displays y singles directamente en tu tienda local.</p>
  <a class="btn-catalog" href="{{ route('catalog') }}">Ver catálogo</a>
</div>

<script>
(function () {
  var btn = document.getElementById('hero-toggle');
  var vid = document.querySelector('.hero-video');
  if (!btn || !vid) return;
  btn.addEventListener('click', function () {
    if (vid.paused) {
      vid.play();
      btn.textContent = '⏸';
      btn.setAttribute('aria-label', 'Pausar video');
      btn.setAttribute('aria-pressed', 'false');
    } else {
      vid.pause();
      btn.textContent = '▶';
      btn.setAttribute('aria-label', 'Reanudar video');
      btn.setAttribute('aria-pressed', 'true');
    }
  });
})();
</script>
@endsection
