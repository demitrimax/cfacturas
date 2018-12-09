<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rfc', 'Rfc:') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('condicion', null, ['class' => 'form-control']) !!}
</div>

<!-- Metodo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metodo', 'Metodo:') !!}
    {!! Form::text('metodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Forma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma', 'Forma:') !!}
    {!! Form::text('forma', null, ['class' => 'form-control']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('concepto', 'Concepto:') !!}
    {!! Form::textarea('concepto', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::textarea('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Adjunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adjunto', 'Adjunto:') !!}
    {!! Form::text('adjunto', null, ['class' => 'form-control']) !!}
</div>

<!-- Atendido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atendido', 'Atendido:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('atendido', false) !!}
        {!! Form::checkbox('atendido', '1', null) !!} 1
    </label>
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Atendidopor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atendidopor', 'Atendidopor:') !!}
    {!! Form::number('atendidopor', null, ['class' => 'form-control']) !!}
</div>

<!-- Facturaid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facturaid', 'Facturaid:') !!}
    {!! Form::number('facturaid', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('solfact.index') !!}" class="btn btn-default">Cancel</a>
</div>
