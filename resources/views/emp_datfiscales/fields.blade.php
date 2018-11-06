<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::number('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Razonsocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razonsocial', 'Razonsocial:') !!}
    {!! Form::text('razonsocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RFC', 'Rfc:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroExt', 'Numeroext:') !!}
    {!! Form::text('numeroExt', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroint Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroInt', 'Numeroint:') !!}
    {!! Form::text('numeroInt', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    {!! Form::number('municipio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Colonia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colonia', 'Colonia:') !!}
    {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
</div>

<!-- Codpostal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codpostal', 'Codpostal:') !!}
    {!! Form::number('codpostal', null, ['class' => 'form-control']) !!}
</div>

<!-- Referencias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('referencias', 'Referencias:') !!}
    {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empDatfiscales.index') !!}" class="btn btn-default">Cancel</a>
</div>
