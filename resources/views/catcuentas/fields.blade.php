<!-- Banco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banco_id', 'Banco Id:') !!}
    {!! Form::select('banco_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Numcuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numcuenta', 'Numcuenta:') !!}
    {!! Form::text('numcuenta', null, ['class' => 'form-control']) !!}
</div>

<!-- Clabeinterbancaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clabeinterbancaria', 'Clabeinterbancaria:') !!}
    {!! Form::number('clabeinterbancaria', null, ['class' => 'form-control']) !!}
</div>

<!-- Sucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sucursal', 'Sucursal:') !!}
    {!! Form::text('sucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::number('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Swift Field -->
<div class="form-group col-sm-6">
    {!! Form::label('swift', 'Swift:') !!}
    {!! Form::text('swift', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catcuentas.index') !!}" class="btn btn-default">Cancel</a>
</div>
