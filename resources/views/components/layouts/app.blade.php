<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', $title ?? 'Sin título') | Control de estadías</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body id="site">
@include('components.partials.navbar.attached')
@if(\Illuminate\Support\Facades\Route::currentRouteName()!=='index' && \Illuminate\Support\Facades\Route::currentRouteName()!=='home')
  @include('components.partials.navbar')
@endif
<main id="site-content">
  @yield('content', $slot ?? 'Sin contenido que mostrar')
</main>
@include('components.partials.footer')
</body>
</html>