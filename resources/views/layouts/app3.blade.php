<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Consorcio Comercial') }}</title>

        <!-- Favicon -->
<link href="{{asset('argondash/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Icons -->
<link href="{{asset('argondash/assets/vendor/nucleo/css/nucleo.min.css')}}" rel="stylesheet">
<link href="{{asset('argondash/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

<!-- Argon CSS -->
<link type="text/css" href="{{asset('argondash/assets/css/argon.min.css')}}" rel="stylesheet">
    </head>

    <body class="bg-default">
      <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
          <div class="container px-4">
            <a class="navbar-brand" href="../index.html">
              <img src="{{asset('argondash/assets/img/brand/white.png')}}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
              <!-- Collapse header -->
              <div class="navbar-collapse-header d-md-none">
                <div class="row">
                  <div class="col-6 collapse-brand">
                    <a href="../index.html">
                      <img src="{{asset('argondash/assets/img/brand/blue.png')}}">
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Navbar items -->
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="../index.html">
                    <i class="ni ni-planet"></i>
                    <span class="nav-link-inner--text">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="../examples/register.html">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="../examples/login.html">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">Login</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="../examples/profile.html">
                    <i class="ni ni-single-02"></i>
                    <span class="nav-link-inner--text">Profile</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
          <div class="container">
            <div class="header-body text-center mb-7">
              <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                  <h1 class="text-white">Bienvenido!</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
        </div>
        @yield('content')
      </div>
      <!-- Footer -->
    @include('layouts.footer')
        <!-- Core -->
<script src="{{asset('argondash/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argondash/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Argon JS -->
<script src="{{asset('argondash/assets/js/argon.min.js')}}"></script>
    </body>

</html>
