<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => '191', 'required']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:*') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength' => '13', 'required' ]) !!}
</div>

<!-- Curp Field -->
<div class="form-group">
    {!! Form::label('CURP', 'CURP:') !!}
    {!! Form::text('CURP', null, ['class' => 'form-control', 'maxlength' => '18']) !!}
</div>


<!-- Persfisica Field -->
<div class="checkbox">
    <label class="checkbox-inline">
        {!! Form::hidden('persfisica', false) !!}
        {!! Form::checkbox('persfisica', '1', null) !!}
        {!! Form::label('persfisica', 'Persona Física') !!}
    </label>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'maxlength' => '191']) !!}
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control', 'maxlength' => '191']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'maxlength' => '15']) !!}
</div>

<!-- COMISION Field -->
<div class="form-group">
    {!! Form::label('comision', 'Porcentaje de Comisión:') !!}
    <div class="input-group">
      {!! Form::number('comision', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'max' => '15.00', 'min'=>'0.09']) !!}
      <span class="input-group-addon">%</span>
  </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sociocomercials.index') !!}" class="btn btn-default">Cancelar</a>
</div>
