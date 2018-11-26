<!-- Fechasolicitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechasolicitud', 'Fechasolicitud:') !!}
    {!! Form::date('fechasolicitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Sociocomer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sociocomer_id', 'Sociocomer Id:') !!}
    {!! Form::number('sociocomer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_id', 'Direccion Id:') !!}
    {!! Form::number('direccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuenta_id', 'Cuenta Id:') !!}
    {!! Form::number('cuenta_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Informacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion', 'Informacion:') !!}
    {!! Form::text('informacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ac Principalporc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ac_principalporc', 'Ac Principalporc:') !!}
    {!! Form::number('ac_principalporc', null, ['class' => 'form-control']) !!}
</div>

<!-- Ac Secundarioporc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ac_secundarioporc', 'Ac Secundarioporc:') !!}
    {!! Form::number('ac_secundarioporc', null, ['class' => 'form-control']) !!}
</div>

<!-- Autorizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autorizado', 'Autorizado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('autorizado', false) !!}
        {!! Form::checkbox('autorizado', '1', null) !!} 1
    </label>
</div>

<!-- Elab User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('elab_user_id', 'Elab User Id:') !!}
    {!! Form::number('elab_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Aut User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_user_id', 'Aut User Id:') !!}
    {!! Form::number('aut_user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Aut User2 Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aut_user2_id', 'Aut User2 Id:') !!}
    {!! Form::number('aut_user2_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accomercials.index') !!}" class="btn btn-default">Cancel</a>
</div>
