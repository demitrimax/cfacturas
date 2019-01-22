@extends('layouts.app_blank')
@section('title',config('app.name').' | Detalle del Acuerdo' )
@section('content')
@section('body')
  onload="window.print();"
@endsection
@include('accomercials.viewacuerdo')
    @endsection
