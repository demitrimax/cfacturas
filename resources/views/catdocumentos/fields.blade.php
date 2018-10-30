<!-- Tipodoc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipodoc', 'Tipodoc:') !!}
    {!! Form::text('tipodoc', null, ['class' => 'form-control']) !!}
</div>

<!-- Archivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('archivo', 'Archivo:') !!}
    {!! Form::file('archivo') !!}
</div>
<div class="clearfix"></div>

<!-- Nota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nota', 'Nota:') !!}
    {!! Form::text('nota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catdocumentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
