<!-- Banco Id Field -->
<div class="form-group">
    {!! Form::label('banco_id', 'Banco:') !!}
    {!! Form::select('banco_id', $bancos, null, ['class' => 'form-control']) !!}
</div>

<!-- Numcuenta Field -->
<div class="form-group">
    {!! Form::label('numcuenta', 'Número de cuenta:') !!}
    {!! Form::text('numcuenta', null, ['class' => 'form-control', 'required'=>'true']) !!}
</div>

<!-- Clabeinterbancaria Field -->
<div class="form-group">
    {!! Form::label('clabeinterbancaria', 'Clabe Interbancaria:') !!}
    {!! Form::number('clabeinterbancaria', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Field -->
<div class="form-group">
    {!! Form::label('sucursal', 'Sucursal:') !!}
    {!! Form::text('sucursal', null, ['class' => 'form-control']) !!}
</div>


<!-- Swift Field -->
<div class="form-group">
    {!! Form::label('swift', 'Cuenta Swift:') !!}
    {!! Form::text('swift', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catcuentas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
