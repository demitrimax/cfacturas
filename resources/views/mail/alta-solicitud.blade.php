<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Solicitud de Factura</title>
  </head>
  <body>
    <p>Se ha dado de alta una nueva solicitud de Factura</p>
    <p>A continuación puede ver los datos de la solicitud:</p>
    <ul>
        <li><b>Usuario Solcita:</b>{{ $user->name }}
        </li>
        <li>
          <b>Correo:</b>{{ $solicitud->correo }}
        </li>
        <li>
          <b>Condición:</b> {{ $solicitud->codicion }}
        </li>
        <li><b>Solcitiud:</b> {{ $solicitud->concepto }}</li>
    </ul>
    <p>
      <a href="{{ url('/solfact/'.$solicitud->id) }}">Haga clic </a> para ver más información de la Solicitud.
    </p>
  </body>
</html>
