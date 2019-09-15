<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login | Chatbot STMIK Dipanegara Makassar</title>
  <meta name="description" content="Login page example">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('media/ico.png') }}" />

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
      },
      active: function () {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <link href="{{ asset('css/login.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("vendors/general/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset("css/style.bundle.min.css") }}" rel="stylesheet" type="text/css" />
</head>

<body
  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

  <!-- begin:: Page -->
  <div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
      <div
        class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

        <!--begin::Aside-->
        <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
          style="background-image: url({{ asset('media/bg-login.svg')}}); background-size: 120%; background-position: center">
        </div>

        <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
          <div class="kt-login__body">
            <!--begin::Signin-->
            <div class="kt-login__form">

              <div class="kt-grid__item kt-grid__item--middle">
                <h3 class="kt-login__title">Aplikasi Chatbot STMIK Dipanegara Makassar</h3>
              </div>

              <div class="kt-login__title">
                <h3>Sign In</h3>
              </div>

              @yield('content')
              <br/><br/>
              <div class="kt-login__copyright kt-font-info">
                <h6>&copy;
                  {{ base64_decode('MjAxOSBNdWguTXV6aGF3aXIgQW1yaSAoMTUyMTAwKSB8IEFuZGkgTnVybmFqaWhhdGluIE5pc3dhICgxNTIwODgp') }}
                </h6>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

</body>
</html>