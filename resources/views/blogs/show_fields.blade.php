
<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $blog->titulo !!}</p>
</div>

<!-- Copete Field -->
<div class="form-group">
    {!! Form::label('copete', 'Copete:') !!}
    <p>{!! $blog->copete !!}</p>
</div>

<!-- Cuerpo Field -->
<div class="form-group">
    {!! Form::label('cuerpo', 'Cuerpo:') !!}
    <p>{!! $blog->cuerpo !!}</p>
</div>

<!-- Usuario Id Field -->
<div class="form-group">
    {!! Form::label('usuario_id', 'Autor:') !!}
    <p>{!! $blog->user->name !!}</p>
</div>
