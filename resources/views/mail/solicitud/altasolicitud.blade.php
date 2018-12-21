@component('mail::message')
# Alta de nueva solicitud de Factura

Estimado {{$user->name}},

Se ha dado de alta una nueva solicitud, en breve nos estaremos comunicando sobre el avance de su solicitud.
La solicitud quedó registrada con Id: {{$solicitud->id}}
Recuerde este número de solicitud para cualquier acalaración.

Detalles:
{!!$solicitud->concepto!!}


Gracias,<br>
El equipo de {{ config('app.name') }}
@endcomponent
