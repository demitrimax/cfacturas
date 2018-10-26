<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidopat', 'Apellidopat:') !!}
    {!! Form::text('apellidopat', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidomat', 'Apellidomat:') !!}
    {!! Form::text('apellidomat', null, ['class' => 'form-control']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RFC', 'Rfc:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control']) !!}
</div>

<!-- Curp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CURP', 'Curp:') !!}
    {!! Form::text('CURP', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
