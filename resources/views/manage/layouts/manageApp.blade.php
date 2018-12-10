<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Printing Requests - MANAGEMENT</title>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="app">
    @include('manage.partials.navs.mainManageNav')
    <main class="main-app-content">
      <div class="row mx-0">
        <div class="col-2 bg-dark text-light text-center h-100">
          @include('manage.partials.navs.sideNav')
        </div>
        {{-- Nav SideBar --}}
        <div class="col-md-10 h-100">
          @yield('content')
        </div>
        {{-- Main Dashboard Content --}}
      </div>
    </main>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  @yield('scripts')
</body>
</html>
