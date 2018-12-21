<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\facsolicitud;

class NuevaSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $solicitud;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, facsolicitud $solicitud)
    {
        //
        $this->user = $user;
        $this->solicitud = $solicitud;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.solicitud.altasolicitud');
    }
}
