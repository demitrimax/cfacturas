@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Socio Comercial {{$sociocomercial->nomcompleto}}
        </h1>
    </section>
    <div class="content">
        @include('sociocomercials.tabs')
        <a href="{!! route('sociocomercials.index') !!}" class="btn btn-default">Regresar</a>
        <a href="{!! route('sociocomercials.edit', [$sociocomercial->id]) !!}" class="btn btn-default">Editar</a>
    </div>
@stack('modals')
@endsection

@section('scripts')
@stack('scripts')
@endsection
