<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => 30]) !!}
</div>

<!-- Denominacionsocial Field -->
<div class="form-group">
    {!! Form::label('denominacionsocial', 'Denominacion Social:') !!}
    {!! Form::text('denominacionsocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombrecorto Field -->
<div class="form-group">
    {!! Form::label('nombrecorto', 'Nombre corto:') !!}
    {!! Form::text('nombrecorto', null, ['class' => 'form-control', 'maxlength' => 10]) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength' => 13]) !!}
</div>

<!-- Entidad Field -->
<div class="form-group">
    {!! Form::label('Entidad', 'Entidad:') !!}
    {!! Form::text('Entidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Grupofinancierto Field -->
<div class="form-group">
    {!! Form::label('grupofinancierto', 'Grupo Financierto:') !!}
    {!! Form::text('grupofinancierto', null, ['class' => 'form-control']) !!}
</div>

<!-- Paginainternet Field -->
<div class="form-group">
    {!! Form::label('paginainternet', 'Pagina de internet:') !!}
    {!! Form::text('paginainternet', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catBancos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
