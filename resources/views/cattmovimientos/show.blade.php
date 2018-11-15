@extends('layouts.app')
@section('title',config('app.name').' | Tipos de Movimientos ')
@section('content')
    <section class="content-header">
        <h1>
            Tipos de Movimientos 
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('cattmovimientos.show_fields')
                    <a href="{!! route('cattmovimientos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
