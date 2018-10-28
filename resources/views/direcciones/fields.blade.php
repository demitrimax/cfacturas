<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroExt', 'Numero Exterior:') !!}
    {!! Form::text('numeroExt', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroint Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroInt', 'Numero Interior:') !!}
    {!! Form::text('numeroInt', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::text('estado_id', null, ['class' => 'form-control']) !!}
</div>
<!-- Municipio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    {!! Form::text('municipio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Colonia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colonia', 'Colonia:') !!}
    {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
</div>

<!-- Codpostal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codpostal', 'Codpostal:') !!}
    {!! Form::text('codpostal', null, ['class' => 'form-control']) !!}
</div>

<!-- Referencias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('referencias', 'Referencias:') !!}
    {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('direcciones.index') !!}" class="btn btn-default">Cancelar</a>
</div>
