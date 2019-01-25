@extends('layouts.app')

@section('content')
<section>
    <div class="container ">

        <section class="error-wrapper text-center">
            <h1><img alt="" src="img/403-_you_are_not_authorized.png"></h1>
            <h2>OOOPS!!!</h2>
            <h3>Algo salió mal, usted no tiene permiso para este recurso..</h3>
            <p class="nrml-txt">Usted puede <a href="mailto:administrador@jmcorporativo.com.mx">contactar a soporte</a> si cree que el problema es de nosotros.</p>
            <a class="back-btn" href="{{url('/home')}}"> Regrese al Inicio</a>
        </section>

    </div>
</section>

@endsection
