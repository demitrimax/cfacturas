@section('css')
<script src="{{asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>

<link rel="stylesheet" href="{{asset('adminlte/bower_components/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}">
@endsection
<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'maxlength'=>'50']) !!}
</div>

<!-- Copete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('copete', 'Copete:') !!}
    {!! Form::text('copete', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuerpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('cuerpo', 'Cuerpo:') !!}
    {!! Form::textarea('cuerpo', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id', 'Usuario:') !!}
    {!! Form::number('usuario_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('blogs.index') !!}" class="btn btn-default">Cancelar</a>
</div>
@section('scripts')
<!-- CK Editor -->
<script src="{{asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('cuerpo')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@endsection
