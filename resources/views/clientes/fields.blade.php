<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Apellidopat Field -->
<div class="form-group">
    {!! Form::label('apellidopat', 'Apellido Paterno:') !!}
    {!! Form::text('apellidopat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Apellidomat Field -->
<div class="form-group">
    {!! Form::label('apellidomat', 'Apellido Materno:') !!}
    {!! Form::text('apellidomat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13']) !!}
</div>

<!-- Curp Field -->
<div class="form-group">
    {!! Form::label('CURP', 'CURP:') !!}
    {!! Form::text('CURP', null, ['class' => 'form-control', 'maxlength'=>'18']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
