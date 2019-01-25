@component('mail::message')
# Solicitud Eliminada

Estimado Cliente, El Usuario {{$usuarioelimina}} ha eliminado su solictud con ID: {{$solicitudes->id}}.
Detalles de la Solicitud:
{!!$solicitudes->concepto!!}

Si cree que hubo un error, porfavor escribanos a este correo: administrador@jmcorporativo.com.mx.

Gracias,<br>
El Equipo de {{ config('app.name') }}
@endcomponent
