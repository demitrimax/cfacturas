@component('mail::message')
# Se ha dado de alta una nueva solicitud de Factura

Estimado Administrador,

Le notificamos que el usuario {{$user->name}} ha dado de alta una nueva solicitud de factura con el Id. {{$solicitud->id}} con las siguiente descripción:
{!! $solicitud->concepto !!}
{{ $solicitud->comentario }}

@component('mail::button', ['url' => '/solfact/'.$solicitud->id ])
Detalles de la Solicitud
@endcomponent

Gracias,<br>
El Equipo de {{ config('app.name') }}
@endcomponent
