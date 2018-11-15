<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cattmovimiento->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $cattmovimiento->descripcion !!}</p>
</div>

<!-- Descrp Corto Field -->
<div class="form-group">
    {!! Form::label('descrp_corto', 'Descrp Corto:') !!}
    <p>{!! $cattmovimiento->descrp_corto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cattmovimiento->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cattmovimiento->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $cattmovimiento->deleted_at !!}</p>
</div>

