<!DOCTYPE html>
<html lang="sk">
<head>
  <meta charset="utf-8"/>
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow">
  <link rel="canonical" href=""/>
  <link rel="prefetch" href="{{ asset('media/logo.svg') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/client/client.css') }}" rel="stylesheet" type="text/css"/>
  @yield('head', '')
</head>
<body class="@yield('class_body', 'body')">
  @yield('content')
  {{-- <script src="{{ route('admin.translations') }}"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('scripts_body', '')
</body>
</html>