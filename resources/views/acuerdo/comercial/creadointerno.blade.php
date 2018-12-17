@component('mail::message')
# Nuevo Acuerdo Comercial

Estimado {{$accomercial->elabuser->name}},

El motivo de este correo es para hacerle de su conocimiento que se ha creado un nuevo ACUERDO COMERCIAL entre {{config('app.name')}} y {{$accomercial->nomcliente}}.

Si desea ver los detalles del acuerdo:
@component('mail::button', ['url' => url('accomercials/'.$accomercial->id)])
Haga Clic aquí.
@endcomponent

Gracias por su atención,<br>
El equipo de {{ config('app.name') }}
@endcomponent
