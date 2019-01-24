@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Socio Comercial {{$sociocomercial->nombre}}
        </h1>
    </section>
    <div class="content">
        @include('sociocomercials.tabs')
        <a href="{!! route('sociocomercials.index') !!}" class="btn btn-default">Regresar</a>
    </div>
@endsection

@section('scripts')
@stack('scripts')
@endsection
