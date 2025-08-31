@extends('layouts.main')

@section('title', 'Gestión de Clientes y Ventas | Inicio')

@section('content')
  <!-- Hero -->
  <section class="relative bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-700 text-white pt-36 pb-24 px-6">
    <div class="max-w-6xl mx-auto text-center" x-data="{ show: false }" x-init="show = true">
      <h1 class="text-4xl md:text-6xl font-bold mb-6" x-show="show" x-transition>
        Gestión Inteligente de Clientes y Ventas
      </h1>
      <p class="text-lg md:text-xl mb-8" x-show="show" x-transition>
        Centraliza la administración de clientes, controla ventas generales y genera reportes con gráficas dinámicas en segundos.
      </p>
      <a href="#servicios" class="bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold shadow-lg hover:bg-gray-200 transition">
        Comenzar Ahora
      </a>
    </div>
  </section>

  <!-- Características -->
  <section class="py-20 px-6 max-w-6xl mx-auto">
    <h2 class="text-3xl font-semibold text-center mb-12">Características Clave</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-gradient-to-br from-blue-100 via-blue-50 to-white rounded-2xl p-8 shadow-lg hover:scale-105 transition-transform">
        <h3 class="text-2xl font-bold mb-4 text-blue-700">Gestión de Clientes</h3>
        <p>Administra contactos, historiales y preferencias de cada cliente en un solo lugar.</p>
      </div>
      <div class="bg-gradient-to-br from-green-100 via-green-50 to-white rounded-2xl p-8 shadow-lg hover:scale-105 transition-transform">
        <h3 class="text-2xl font-bold mb-4 text-green-700">Control de Ventas</h3>
        <p>Organiza y analiza ventas generales, separadas por cliente y períodos de tiempo.</p>
      </div>
      <div class="bg-gradient-to-br from-purple-100 via-purple-50 to-white rounded-2xl p-8 shadow-lg hover:scale-105 transition-transform">
        <h3 class="text-2xl font-bold mb-4 text-purple-700">Reportes y Gráficas</h3>
        <p>Obtén reportes descargables y gráficas dinámicas para una mejor toma de decisiones.</p>
      </div>
    </div>
  </section>

  <!-- Beneficios -->
  <section class="py-20 bg-gradient-to-r from-gray-50 via-white to-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-semibold mb-12">Beneficios de Usar Nuestra Plataforma</h2>
      <ul class="grid md:grid-cols-2 gap-6 text-left">
        <li class="flex items-start gap-4">
          <span class="text-blue-600 text-2xl">✔</span>
          <p><strong>Ahorro de tiempo:</strong> genera reportes en segundos y evita procesos manuales.</p>
        </li>
        <li class="flex items-start gap-4">
          <span class="text-green-600 text-2xl">✔</span>
          <p><strong>Visión clara:</strong> visualiza las ventas y clientes más importantes con gráficas dinámicas.</p>
        </li>
        <li class="flex items-start gap-4">
          <span class="text-purple-600 text-2xl">✔</span>
          <p><strong>Seguridad de datos:</strong> toda tu información protegida con cifrado y respaldos automáticos.</p>
        </li>
        <li class="flex items-start gap-4">
          <span class="text-orange-600 text-2xl">✔</span>
          <p><strong>Escalabilidad:</strong> diseñado para crecer con tu negocio, sin importar su tamaño.</p>
        </li>
      </ul>
    </div>
  </section>

  <!-- Cómo funciona -->
  <section class="py-20 px-6 max-w-6xl mx-auto">
    <h2 class="text-3xl font-semibold text-center mb-12">¿Cómo Funciona?</h2>
    <div class="grid md:grid-cols-3 gap-8 text-center">
      <div class="p-6 rounded-xl bg-gradient-to-br from-blue-50 to-white shadow-md">
        <span class="text-4xl font-bold text-blue-600">1</span>
        <h3 class="mt-4 text-xl font-bold">Regístrate</h3>
        <p>Crea una cuenta gratuita en minutos y comienza a explorar la plataforma.</p>
      </div>
      <div class="p-6 rounded-xl bg-gradient-to-br from-green-50 to-white shadow-md">
        <span class="text-4xl font-bold text-green-600">2</span>
        <h3 class="mt-4 text-xl font-bold">Administra</h3>
        <p>Agrega clientes, registra ventas y organiza tus datos en un solo lugar.</p>
      </div>
      <div class="p-6 rounded-xl bg-gradient-to-br from-purple-50 to-white shadow-md">
        <span class="text-4xl font-bold text-purple-600">3</span>
        <h3 class="mt-4 text-xl font-bold">Analiza</h3>
        <p>Genera reportes y gráficas en segundos para mejorar tus decisiones.</p>
      </div>
    </div>
  </section>

  <!-- Planes -->
  <section class="py-20 bg-gradient-to-r from-blue-50 via-white to-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-semibold mb-12">Planes y Precios</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="p-6 rounded-xl border shadow hover:shadow-lg transition">
          <h3 class="text-xl font-bold mb-2">Gratis</h3>
          <p class="mb-4">Ideal para probar la plataforma.</p>
          <p class="text-3xl font-bold mb-6">$0</p>
          <ul class="text-left space-y-2 mb-6">
            <li>✔ Hasta 50 clientes</li>
            <li>✔ Ventas básicas</li>
            <li>✔ Reportes limitados</li>
          </ul>
          <a href="/register" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Comenzar</a>
        </div>
        <div class="p-6 rounded-xl border-2 border-blue-600 shadow-lg scale-105">
          <h3 class="text-xl font-bold mb-2 text-blue-600">Profesional</h3>
          <p class="mb-4">Para pequeñas y medianas empresas.</p>
          <p class="text-3xl font-bold mb-6">$19/mes</p>
          <ul class="text-left space-y-2 mb-6">
            <li>✔ Clientes ilimitados</li>
            <li>✔ Reportes avanzados</li>
            <li>✔ Gráficas interactivas</li>
            <li>✔ Soporte prioritario</li>
          </ul>
          <a href="/register" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Probar Gratis</a>
        </div>
        <div class="p-6 rounded-xl border shadow hover:shadow-lg transition">
          <h3 class="text-xl font-bold mb-2">Empresarial</h3>
          <p class="mb-4">Para grandes empresas y equipos.</p>
          <p class="text-3xl font-bold mb-6">Custom</p>
          <ul class="text-left space-y-2 mb-6">
            <li>✔ Integraciones personalizadas</li>
            <li>✔ Soporte dedicado</li>
            <li>✔ Análisis a medida</li>
          </ul>
          <a href="/contact" class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900">Contáctanos</a>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="py-20 px-6 max-w-4xl mx-auto">
    <h2 class="text-3xl font-semibold text-center mb-12">Preguntas Frecuentes</h2>
    <div class="space-y-6" x-data="{ open: null }">
      <div class="border rounded-lg p-4 bg-white shadow">
        <button @click="open = open === 1 ? null : 1" class="w-full flex justify-between items-center font-semibold">
          ¿Puedo probar la plataforma gratis?
          <span x-show="open !== 1">+</span>
          <span x-show="open === 1">-</span>
        </button>
        <p x-show="open === 1" x-transition class="mt-2 text-gray-600">
          Sí, ofrecemos un plan gratuito con funcionalidades básicas para que explores todo.
        </p>
      </div>
      <div class="border rounded-lg p-4 bg-white shadow">
        <button @click="open = open === 2 ? null : 2" class="w-full flex justify-between items-center font-semibold">
          ¿Puedo cancelar en cualquier momento?
          <span x-show="open !== 2">+</span>
          <span x-show="open === 2">-</span>
        </button>
        <p x-show="open === 2" x-transition class="mt-2 text-gray-600">
          Sí, puedes cancelar tu suscripción cuando quieras, sin cargos adicionales.
        </p>
      </div>
      <div class="border rounded-lg p-4 bg-white shadow">
        <button @click="open = open === 3 ? null : 3" class="w-full flex justify-between items-center font-semibold">
          ¿La información de mis clientes está segura?
          <span x-show="open !== 3">+</span>
          <span x-show="open === 3">-</span>
        </button>
        <p x-show="open === 3" x-transition class="mt-2 text-gray-600">
          Absolutamente, usamos cifrado y servidores seguros para proteger tus datos.
        </p>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-20 px-6 bg-gradient-to-r from-blue-700 via-cyan-600 to-blue-800 text-white text-center">
    <h2 class="text-4xl font-bold mb-6">Optimiza tu gestión de clientes y ventas</h2>
    <p class="mb-8 text-lg">Comienza hoy mismo a organizar tu negocio con reportes y gráficas en tiempo real.</p>
    <a href="/register" class="bg-white text-blue-700 px-10 py-4 rounded-xl font-semibold shadow-lg hover:bg-gray-200 transition">
      Probar Gratis
    </a>
  </section>
@endsection
