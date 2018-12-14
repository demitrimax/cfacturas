@extends('layouts.app')
@section('title',config('app.name').' | Detalle del Acuerdo' )
@section('content')
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
