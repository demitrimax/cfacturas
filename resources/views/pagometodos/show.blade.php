@extends('layouts.app')
@section('title',config('app.name').' | Método de Pago' )

@section('content')
    <section class="content-header">
        <h1>
            Método de Pago
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pagometodos.show_fields')
                    <a href="{!! route('pagometodos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
