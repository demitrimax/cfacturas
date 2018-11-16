<!-- Cuenta Id Field -->
<div class="form-group">
    {!! Form::label('cuenta_id', 'Cuenta Id:') !!}
    {!! Form::number('cuenta_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Toperacion Field -->
<div class="form-group">
    {!! Form::label('toperacion', 'Toperacion:') !!}
    {!! Form::text('toperacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tmovimiento Field -->
<div class="form-group">
    {!! Form::label('tmovimiento', 'Tmovimiento:') !!}
    {!! Form::number('tmovimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('concepto', 'Concepto:') !!}
    {!! Form::text('concepto', null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Field -->
<div class="form-group">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::number('monto', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Saldo Field -->
<div class="form-group">
    {!! Form::label('saldo', 'Saldo:') !!}
    {!! Form::number('saldo', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mbancas.index') !!}" class="btn btn-default">Cancel</a>
</div>
