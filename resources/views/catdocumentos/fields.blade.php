<!-- Tipodoc Field -->
<div class="form-group">
    {!! Form::label('tipodoc', 'Tipo de Documento:') !!}
    {!! Form::select('tipodoc', $tipodocs, null, ['class' => 'form-control']) !!}
</div>

<!-- Archivo Field -->
<div class="form-group">
    {!! Form::label('archivo', 'Archivo:') !!}
    {!! Form::file('archivo') !!}
</div>
<div class="clearfix"></div>

<!-- Nota Field -->
<div class="form-group">
    {!! Form::label('nota', 'Nota:') !!}
    {!! Form::text('nota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catdocumentos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
