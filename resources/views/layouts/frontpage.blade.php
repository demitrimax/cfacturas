<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title',config('app.name')) </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontpage/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('frontpage/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontpage/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontpage/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontpage/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('frontpage/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/style.css')}}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>

    <link rel="shortcut icon" href="{{{ asset('favicon/favicon.ico') }}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5768942402334226",
          enable_page_level_ads: true
        });
      </script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" data-aos="fade-down" data-aos-delay="500">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="favicon/jmcorp_small.png" alt="JM Corp Logo" width="32" height="32"> Corporativo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.html" class="nav-link">Principal</a></li>
            <li class="nav-item"><a href="practice.html" class="nav-link">Los Conta</a></li>
            <li class="nav-item"><a href="won.html" class="nav-link">Nuestros Clientes</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Acerca de</a></li>
            @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Aplicativo</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                    @endauth
            @endif

          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

      @yield('content')

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Acerca de JM Corporativo</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Sobre Nosotros</a></li>
              <li><a href="#" class="py-2 d-block">Los Conta</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Contactenos</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Comunidad</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Soporte</a></li>
              <li><a href="#" class="py-2 d-block">Muestros clientes</a></li>
              <li><a href="#" class="py-2 d-block">Tu Contabilidad</a></li>
              <li><a href="#" class="py-2 d-block">Privacidad</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Información de Contaco</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">198 West 21th Street, Suite 721 New York NY 10016</a></li>
              <li><a href="#" class="py-2 d-block">+ 1235 2355 98</a></li>
              <li><a href="#" class="py-2 d-block">info@yoursite.com</a></li>
              <li><a href="#" class="py-2 d-block">email@email.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Horarios de Servicio</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Lunes - Jueves: 9:00 - 20:00</a></li>
              <li><a href="#" class="py-2 d-block">Viernes: 9:00 - 15:00</a></li>
              <li><a href="#" class="py-2 d-block">Sábados 10:00 - 14:00</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('frontpage/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontpage/js/popper.min.js')}}"></script>
  <script src="{{asset('frontpage/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontpage/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontpage/js/aos.js')}}"></script>
  <script src="{{asset('frontpage/js/jquery.animateNumber.min.js')}}"></script>
  <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
  <!--- <script src="{{asset('frontpage/js/google-map.js')}}"></script> -->
  <script src="{{asset('frontpage/js/main.js')}}"></script>
  <script>

	var mymap = L.map('mapid').setView([17.98, -92.94], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([17.9878, -92.9406]).addTo(mymap);




</script>

  </body>
</html>
