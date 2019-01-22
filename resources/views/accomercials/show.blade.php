@extends('layouts.app')
@section('title',config('app.name').' | Detalle del Acuerdo' )
@section('content')
@if( session('mensaje'))
<div class="alert alert-success" role="alert">
    <a href="#" class="alert-link"> {{ session('mensaje') }}</a>
</div>
@endif
    <section class="content-header">
        <h1>
            Acuerdo Comercial
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Acuerdos Comerciales</li>
          <li class="active">Acuerdo</li>
      </ol>

@include('accomercials.viewacuerdo')

@endsection
