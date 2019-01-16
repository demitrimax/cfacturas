@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('blogs.show_fields')
                    <a href="{!! route('blogs.index') !!}" class="btn btn-default">Regresar</a>
                    <a href="{!! route('blogs.edit',[$blog->id]) !!}" class="btn btn-default">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
