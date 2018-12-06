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
        <form>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:*') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' =>'150', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('correo', 'Correo Electronico:*') !!}
                {!! Form::email('correo', null, ['class' => 'form-control', 'maxlength' =>'150', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('RFC', 'RFC:*') !!}
                {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength' =>'150','placeholder'=>'RFC registrado', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('solicitud', 'Solicitud:*') !!}
                {!! Form::textarea('solicitud', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! NoCaptcha::display() !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! url('/') !!}" class="btn btn-default">Cancelar</a>
            </div>

      </form>
      </div>

    </div> <!-- /container -->

             {!! NoCaptcha::renderJs() !!}
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
                CKEDITOR.replace('solicitud')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
              })
            </script>

      </body>
    </html>
