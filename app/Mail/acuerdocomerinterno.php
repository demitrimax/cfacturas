<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\accomercial;
use App\User;

class acuerdocomerinterno extends Mailable
{
    use Queueable, SerializesModels;
    public $accomercial;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(accomercial $accomercial, User $user)
    {
        //
        $this->accomercial = $accomercial;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('acuerdo.comercial.creadointerno2')->subject('Alta de Nuevo Acuerdo Comercial');
    }
}
