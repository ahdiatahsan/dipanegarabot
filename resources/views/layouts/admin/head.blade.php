<head>
  <meta charset="utf-8" />
  <meta name="description" content="Aplikasi Chatbot STMIK Dipanegara Makassar">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | Aplikasi Chatbot STMIK Dipanegara Makassar</title>

  <link rel="shortcut icon" href="{{ asset('media/ico.png') }}" />
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="{{ asset('vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/style.bundle.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/skins/header/menu/light.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/skins/header/base/light.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/skins/brand/dark.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/skins/aside/dark.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('vendors/general/tether/dist/css/tether.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('vendors/custom/vendors/flaticon2/flaticon.css') }}" type="text/css" />
  @yield('style')

  @yield('topjs')
</head>
