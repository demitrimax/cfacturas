<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'maxlength'=>'50']) !!}
</div>

<!-- Descrp Corto Field -->
<div class="form-group">
    {!! Form::label('descrp_corto', 'Descrp Corto:') !!}
    {!! Form::text('descrp_corto', null, ['class' => 'form-control', 'maxlength'=>'10']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cattmovimientos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
