<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name')}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS -->
        <link href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="{{asset('css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{asset('css/navbar-fixed-top.css')}}" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="adminlte/bower_components/ckeditor/ckeditor.js"></script>
        <script src="adminlte/bower_components/ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="adminlte/bower_components/ckeditor/samples/css/samples.css">
        <link rel="stylesheet" href="adminlte/bower_components/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
      </head>
      <body>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{ config('app.name')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Inicio</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->


        <h3>Enviar Solicitud</h3>
          <div class="content">
            @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           @if( session('mensaje'))
           <div class="alert alert-success" role="alert">
               <a href="#" class="alert-link"> {{ session('mensaje') }}</a>
          </div>
           @endif
          {!! Form::open(['url' => 'solicitud', 'enctype'=>'multipart/form-data']) !!}
          <div class="panel panel-primary">
            <div class="panel-heading">Datos del Solicitante</div>
              <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:*') !!}
                    {!! Form::text('nombre', Auth::user()->name, ['class' => 'form-control', 'maxlength' =>'150', 'required']) !!}
                    {!! Form::hidden('fecha', date("Y-m-d")) !!}
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('correo', 'Correo Electronico:*') !!}
                    {!! Form::email('correo', Auth::user()->email, ['class' => 'form-control', 'maxlength' =>'150', 'required', 'placeholder'=>'correo@electronico.com']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono:*') !!}
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'maxlength' =>'10', 'required', 'placeholder' => 'Teléfono']) !!}
                </div>

              </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Datos de la Solicitud</div>
            <div class="panel-body">
              <div class="form-group">
                  {!! Form::label('rfc', 'RFC:*') !!}
                  {!! Form::text('rfc', null, ['class' => 'form-control', 'maxlength' =>'150','placeholder'=>'RFC registrado', 'required']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('condicion', 'Condición de Pago:*') !!}
                  {!! Form::select('condicion', ['Efectivo'=>'Efectivo','Credito' =>'Credito','No Aplica' => 'No Aplica', 'Otro' =>'Otro'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('metodo', 'Metodo de Pago:*') !!}
                  {!! Form::select('metodo', ['PPD'=>'PPD','PUE' =>'PUE'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('forma', 'Forma de Pago:*') !!}
                  {!! Form::select('forma', ['Efectivo'=>'Efectivo','Cheque' =>'Cheque', 'Transferencia'=>'Transferencia','Por definir' => 'Por Definir'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
              </div>
                <div class="form-group">
                    {!! Form::label('concepto', 'Concepto:*') !!}
                    {!! Form::textarea('concepto', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comentarios', 'Comentarios:') !!}
                    {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('adjunto', 'Adjuntar:') !!}
                    {!! Form::file('adjunto', null, ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="panel-footer">
              <div class="form-group">
                {!! NoCaptcha::display() !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! url('/') !!}" class="btn btn-default">Cancelar</a>
            </div>
          </div>
        </div>



      {!! Form::close() !!}
      </div>

    </div> <!-- /container -->

            <!-- {!! NoCaptcha::renderJs() !!} -->
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="adminlte/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
            <script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="js/ie10-viewport-bug-workaround.js"></script>
            <!-- CK Editor -->
            <script src="adminlte/bower_components/ckeditor/ckeditor.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <script>
              $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('concepto')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
              })
            </script>

      </body>
    </html>
