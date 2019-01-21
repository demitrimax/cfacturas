<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'required', 'maxlength' => '125']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'required', 'maxlength' => '5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catgiroempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
