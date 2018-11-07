<!-- Empresa Id Field -->

    {!! Form::hidden('empresa_id', null, ['class' => 'form-control']) !!}


<!-- Razonsocial Field -->
<div class="form-group">
    {!! Form::label('razonsocial', 'Razon Social:') !!}
    {!! Form::text('razonsocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13', 'onKeyUp'=>'this.value=this.value.toUpperCase();']) !!}
</div>

<!-- Calle Field -->
<div class="form-group">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroext Field -->
<div class="form-group">
    {!! Form::label('numeroExt', 'Numero Exterior:') !!}
    {!! Form::text('numeroExt', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroint Field -->
<div class="form-group">
    {!! Form::label('numeroInt', 'Numero Interior:') !!}
    {!! Form::text('numeroInt', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
<div class="form-group">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Id Field -->
<div class="form-group">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    {!! Form::number('municipio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Colonia Field -->
<div class="form-group">
    {!! Form::label('colonia', 'Colonia:') !!}
    {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
</div>

<!-- Codpostal Field -->
<div class="form-group">
    {!! Form::label('codpostal', 'Código Postal:') !!}
    {!! Form::number('codpostal', null, ['class' => 'form-control']) !!}
</div>

<!-- Referencias Field -->
<div class="form-group">
    {!! Form::label('referencias', 'Referencias:') !!}
    {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
