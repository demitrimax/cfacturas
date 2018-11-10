
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $users->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $users->email !!}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{!! $users->email_verified_at !!}</p>
</div>


<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', 'Avatar:') !!}
    <p>{!! $users->avatar !!}</p>
</div>

<!-- Rol Field -->
<div class="form-group">
    {!! Form::label('rol', 'Rol:') !!}
    <p>{!! $users->rol !!}</p>
</div>
