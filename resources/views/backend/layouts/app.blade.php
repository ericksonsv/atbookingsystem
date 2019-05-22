<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - @yield('title', 'Dashboard')</title>
  <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
  @yield('styles')
</head>
<body>
  <div id="backend-app">
    @include('backend.layouts.partials.nav')
    @include('backend.layouts.partials.sidebar')
    <main id="backend-main">
      @yield('content')
    </main>
    @include('backend.layouts.partials.footer')
  </div>
  <script src="{{ asset('js/backend.js') }}"></script>
  @include('backend.partials.alerts')
  @yield('scripts')
</body>
</html>
