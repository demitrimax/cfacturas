@extends('layouts.app')
@section('title',config('app.name').' | Detalle del Acuerdo' )
@section('content')
    <section class="content-header">
        <h1>
            Acuerdo Comercial
        </h1>


                    @include('accomercials.viewacuerdo')


@endsection
