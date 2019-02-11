@extends('layouts.app_blank')
@section('title',config('app.name').' | Imprimir Solicitud InterEmpresa' )
@section('content')
  @section('body')
    onload="window.print();"
  @endsection

@include('solicitudes.interEmp')

@endsection
