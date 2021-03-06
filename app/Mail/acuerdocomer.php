<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\accomercial;

class acuerdocomer extends Mailable
{
    use Queueable, SerializesModels;

    public $accomercial;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(accomercial $accomercial)
    {
        //
        $this->accomercial = $accomercial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('acuerdo.comercial.creado')->subject('Nuevo Acuerdo Comercial');
    }
}
