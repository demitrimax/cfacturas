<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\solicitudes;

class SolicitudEliminada extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitudes;
    public $usuarioelimina;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(solicitudes $solicitudes, $usuarioelimina)
    {
        //
        $this->solicitudes = $solicitudes;
        $this->usuarioelimina = $usuarioelimina;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.solicitud.elimina')->subject('Solicitud Eliminada');
    }
}
