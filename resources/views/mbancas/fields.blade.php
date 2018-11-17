<!-- Cuenta Id Field -->
<div class="form-group">
    {!! Form::label('cuenta_id', 'Cuenta:') !!}
    {!! Form::select('cuenta_id', $cuentas, null, ['class' => 'form-control']) !!}
</div>

<!-- Toperacion Field -->
<div class="form-group">
    {!! Form::label('toperacion', 'Tipo de operacion:') !!}
    {!! Form::select('toperacion', ['cargo'=>'Cargo','abono'=>'Abono'],null, ['class' => 'form-control']) !!}
</div>

<!-- Tmovimiento Field -->
<div class="form-group">
    {!! Form::label('tmovimiento', 'Tipo de movimiento:') !!}
    {!! Form::select('tmovimiento', $cattmovimiento,null, ['class' => 'form-control']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('concepto', 'Concepto:') !!}
    {!! Form::text('concepto', null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Field -->
<div class="form-group">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::number('monto', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Saldo Field -->
<div class="form-group">
    {!! Form::label('saldo', 'Saldo:') !!}
    {!! Form::number('saldo', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Usuario:') !!}
    {!! Form::select('user_id', $usuarios ,Auth::User()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mbancas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
